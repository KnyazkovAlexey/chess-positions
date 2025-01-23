<?php declare(strict_types=1);

namespace Containers\Positions\Actions;

use Containers\Positions\Dto\GetPositionResponseDto;
use Containers\Positions\Exceptions\PositionNotFoundException;
use Framework\Action;
use Containers\Positions\Dto\GetPositionRequestDto;
use Containers\Positions\Repositories\PositionRepository;
use Containers\Positions\Tasks\ParsePositionTask;

class GetPositionAction extends Action
{
    protected PositionRepository $positionRepository;
    protected ParsePositionTask $parsePositionTask;

    public function __construct()
    {
        $this->positionRepository = app(PositionRepository::class);
        $this->parsePositionTask = app(ParsePositionTask::class);
    }

    /**
     * @param GetPositionRequestDto $dto
     * @return GetPositionResponseDto
     * @throws PositionNotFoundException
     */
    public function run(GetPositionRequestDto $dto): GetPositionResponseDto
    {
        $position = $this->positionRepository->findById($dto->id);

        if (empty($position)) {
            throw new PositionNotFoundException('Position not found');
        }

        $chessboard = $this->parsePositionTask->run($position->position);

        return new GetPositionResponseDto([
            'chessboard' => $chessboard,
        ]);
    }
}