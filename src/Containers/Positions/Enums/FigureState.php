<?php declare(strict_types=1);

namespace Containers\Positions\Enums;

enum FigureState: string {
    case A1 = '0';
    case A2 = '1';
    case A3 = '2';
    case A4 = '3';
    case A5 = '4';
    case A6 = '5';
    case A7 = '6';
    case A8 = '7';
    case B1 = '8';
    case B2 = '9';
    case B3 = 'A';
    case B4 = 'a';
    case B5 = 'B';
    case B6 = 'b';
    case B7 = 'C';
    case B8 = 'c';
    case C1 = 'D';
    case C2 = 'd';
    case C3 = 'E';
    case C4 = 'e';
    case C5 = 'F';
    case C6 = 'f';
    case C7 = 'G';
    case C8 = 'g';
    case D1 = 'H';
    case D2 = 'h';
    case D3 = 'I';
    case D4 = 'i';
    case D5 = 'J';
    case D6 = 'j';
    case D7 = 'K';
    case D8 = 'k';
    case E1 = 'L';
    case E2 = 'l';
    case E3 = 'M';
    case E4 = 'm';
    case E5 = 'N';
    case E6 = 'n';
    case E7 = 'O';
    case E8 = 'o';
    case F1 = 'P';
    case F2 = 'p';
    case F3 = 'Q';
    case F4 = 'q';
    case F5 = 'R';
    case F6 = 'r';
    case F7 = 'S';
    case F8 = 's';
    case G1 = 'T';
    case G2 = 't';
    case G3 = 'U';
    case G4 = 'u';
    case G5 = 'V';
    case G6 = 'v';
    case G7 = 'W';
    case G8 = 'w';
    case H1 = 'X';
    case H2 = 'x';
    case H3 = 'Y';
    case H4 = 'y';
    case H5 = 'Z';
    case H6 = 'z';
    case H7 = '?';
    case H8 = '!';
    case EATEN = '.';

    /**
     * @return string[]
     */
    public static function getSquaresStates(): array
    {
        return array_filter(
            array_map(fn($enum) => $enum->value, static::cases()),
            fn(string $value) => $value !== self::EATEN->value,
        );
    }
}