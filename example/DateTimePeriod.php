<?php declare(strict_types=1);

namespace ExampleVendor;

use DateTimeImmutable;
use DateTimeInterface;
use InvalidArgumentException;

class DateTimePeriod
{
    protected const DATETIME_FORMAT = 'Y-m-d H:i:s';

    /** @var DateTimeImmutable */
    private $startAt;
    /** @var DateTimeImmutable */
    private $endAt;

    public function __construct(DateTimeImmutable $startAt, DateTimeImmutable $endAt)
    {
        $this->startAt = $startAt;
        $this->endAt = $endAt;
    }

    /**
     * @param array|DateTimeImmutable[] $dateTimes
     * @throws InvalidArgumentException
     */
    public function contains(array $dateTimes): bool
    {
       foreach ($dateTimes as $dateTime) {
           if (!($dateTime instanceof DateTimeInterface)) {
               throw new InvalidArgumentException(sprintf(
                   'Invalid argument, expected %s, got: %s',
                   DateTimeInterface::class,
                   gettype($dateTime) === 'object' ? get_class($dateTime) : gettype($dateTime)
               ));
           }
           if ($dateTime < $this->startAt || $this->endAt < $dateTime) {
               return false;
           }
       }

       return true;
    }

    public function toString(): string
    {
        return sprintf(
            '%s|%s',
            $this->startAt->format(self::DATETIME_FORMAT),
            $this->endAt->format(self::DATETIME_FORMAT)
        );
    }
}
