<?php

declare(strict_types=1);

namespace BOA\Programs;

use Carbon\CarbonInterface;

/**
 * @author shimomo
 */
interface ScraperInterface
{
    /**
     * @psalm-type ScrapedBoat = array{
     *     racer_boat_number: int,
     *     racer_name: string,
     *     racer_number: int,
     *     racer_class_number: int,
     *     racer_branch_number: int,
     *     racer_birthplace_number: int,
     *     racer_age: int,
     *     racer_weight: float,
     *     racer_flying_count: int,
     *     racer_late_count: int,
     *     racer_average_start_timing: float,
     *     racer_national_top_1_percent: float,
     *     racer_national_top_2_percent: float,
     *     racer_national_top_3_percent: float,
     *     racer_local_top_1_percent: float,
     *     racer_local_top_2_percent: float,
     *     racer_local_top_3_percent: float,
     *     racer_assigned_motor_number: int,
     *     racer_assigned_motor_top_2_percent: float,
     *     racer_assigned_motor_top_3_percent: float,
     *     racer_assigned_boat_number: int,
     *     racer_assigned_boat_top_2_percent: float,
     *     racer_assigned_boat_top_3_percent: float
     * }
     * @psalm-type ScrapedRace = array{
     *     race_date: string,
     *     race_stadium_number: int,
     *     race_number: int,
     *     race_closed_at: string,
     *     race_grade_number: int,
     *     race_title: string,
     *     race_subtitle: string,
     *     race_distance: int,
     *     boats: array<int, ScrapedBoat>
     * }
     * @psalm-type ScrapedRaces = array<int, ScrapedRace>
     * @psalm-type ScrapedStadiumRaces = array<int, ScrapedRaces>
     *
     * @param  \Carbon\CarbonInterface  $date
     * @return ScrapedStadiumRaces
     */
    public function scrapePrograms(CarbonInterface $date): array;
}
