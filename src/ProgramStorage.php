<?php

declare(strict_types=1);

namespace BOA\Programs;

/**
 * @author shimomo
 */
final class ProgramStorage
{
    /**
     * @phpstan-type NormalizedBoat array{
     *     racer_boat_number: int,
     *     racer_name: string,
     *     racer_number: int,
     *     racer_class_number: int,
     *     racer_branch_number: int,
     *     racer_birthplace_number: int,
     *     racer_age: int,
     *     racer_weight: float|int,
     *     racer_flying_count: int,
     *     racer_late_count: int,
     *     racer_average_start_timing: float|int,
     *     racer_national_top_1_percent: float|int,
     *     racer_national_top_2_percent: float|int,
     *     racer_national_top_3_percent: float|int,
     *     racer_local_top_1_percent: float|int,
     *     racer_local_top_2_percent: float|int,
     *     racer_local_top_3_percent: float|int,
     *     racer_assigned_motor_number: int,
     *     racer_assigned_motor_top_2_percent: float|int,
     *     racer_assigned_motor_top_3_percent: float|int,
     *     racer_assigned_boat_number: int,
     *     racer_assigned_boat_top_2_percent: float|int,
     *     racer_assigned_boat_top_3_percent: float|int
     * }
     * @phpstan-type NormalizedRace array{
     *     race_date: string,
     *     race_stadium_number: int,
     *     race_number: int,
     *     race_closed_at: string,
     *     race_grade_number: int,
     *     race_title: string,
     *     race_subtitle: string,
     *     race_distance: int,
     *     boats: array<int, NormalizedBoat>
     * }
     * @phpstan-type NormalizedRaces array<int, NormalizedRace>
     *
     * @param  array<int, NormalizedRaces>  $programs
     * @param  non-empty-string             $path
     * @return void
     * @throws \RuntimeException
     */
    public function save(array $programs, string $path): void
    {
        $contents = json_encode(['programs' => $programs]);
        if ($contents !== false && file_put_contents($path, $contents) === false) {
            throw new \RuntimeException("Failed to save programs to {$path}");
        }
    }
}
