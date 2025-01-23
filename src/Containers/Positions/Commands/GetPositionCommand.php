<?php declare(strict_types=1);

namespace Containers\Positions\Commands;

use Containers\Positions\Actions\GetPositionAction;
use Containers\Positions\Dto\GetPositionRequestDto;
use Containers\Positions\Exceptions\PositionNotFoundException;
use Framework\Console\Command;
use Framework\Console\Request;
use Containers\Positions\Validators\GetPositionValidator;
use Containers\Positions\Views\PositionView;

class GetPositionCommand extends Command
{
    protected GetPositionValidator $requestValidator;
    protected GetPositionAction $getPositionAction;
    protected PositionView $positionView;

    public function __construct()
    {
        $this->requestValidator = app(GetPositionValidator::class);
        $this->getPositionAction = app(GetPositionAction::class);
        $this->positionView = app(PositionView::class);
    }

    public function run(Request $request): void
    {
        if (!$this->requestValidator->validate($request->all())) {
            $this->write('Validation error');
            return;
        }

        try {
            $responseDto = $this->getPositionAction->run(new GetPositionRequestDto([
                'id' => $request->getInt('id'),
            ]));
        } catch (PositionNotFoundException $e) {
            $this->write($e->getMessage());
            return;
        }

        $this->write(
            $this->positionView->render([
                'chessboard' => $responseDto->chessboard,
            ]),
        );
    }
}