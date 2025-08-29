<?php

declare(strict_types=1);

namespace BOA\Previews\Tests;

use BOA\Programs\ProgramScraper;
use BOA\Programs\ScraperInterface;
use Carbon\CarbonImmutable as Carbon;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-import-type ScrapedStadiumRaces from ScraperInterface
 *
 * @author shimomo
 */
final class ProgramScraperTest extends Testcase
{
    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testScrape(): void
    {
        $mockScraper = $this->createMock(ScraperInterface::class);
        $mockScraper->method('scrapePrograms')
            ->with(Carbon::create(2025, 7, 15))
            ->willReturn([
                $this->testScrapeData(1),
            ]);
        $scraper = new ProgramScraper($mockScraper);
        $programs = $scraper->scrape(Carbon::create(2025, 7, 15));
        $this->assertSame($this->testScrapeData(0), $programs);
    }

    /**
     * @psalm-param int $keyIndex
     * @psalm-return ScrapedStadiumRaces
     *
     * @param int $keyIndex
     * @return array
     */
    private function testScrapeData(int $keyIndex): array
    {
        return [
            $keyIndex => [
                'race_date' => '2025-07-15',
                'race_stadium_number' => 1,
                'race_number' => 1,
                'race_closed_at' => '2025-07-15 15:17:00',
                'race_grade_number' => 5,
                'race_title' => 'にっぽん未来プロジェクト競走in桐生',
                'race_subtitle' => '予選',
                'race_distance' => 1800,
                'boats' => [
                    $keyIndex => [
                        'racer_boat_number' => 1,
                        'racer_name' => '松本 浩貴',
                        'racer_number' => 3860,
                        'racer_class_number' => 3,
                        'racer_branch_number' => 11,
                        'racer_birthplace_number' => 11,
                        'racer_age' => 52,
                        'racer_weight' => 52,
                        'racer_flying_count' => 0,
                        'racer_late_count' => 0,
                        'racer_average_start_timing' => 0.19,
                        'racer_national_top_1_percent' => 4.09,
                        'racer_national_top_2_percent' => 18.48,
                        'racer_national_top_3_percent' => 39.13,
                        'racer_local_top_1_percent' => 4.85,
                        'racer_local_top_2_percent' => 33.33,
                        'racer_local_top_3_percent' => 40.74,
                        'racer_assigned_motor_number' => 24,
                        'racer_assigned_motor_top_2_percent' => 28,
                        'racer_assigned_motor_top_3_percent' => 42.67,
                        'racer_assigned_boat_number' => 23,
                        'racer_assigned_boat_top_2_percent' => 30.47,
                        'racer_assigned_boat_top_3_percent' => 51.56,
                    ],
                ],
            ],
        ];
    }
}
