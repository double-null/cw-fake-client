<?php declare(strict_types=1);

namespace CW\Modules\Client\Enums;

enum VoteCode : int
{
    case ERROR = -1;
    case SUCCESS = 0;
    case NOT_FOUND = 1102;
    case NO_ATTEMPTS = 1103;
    case EXPIRED = 1106;
}
