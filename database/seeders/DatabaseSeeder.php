<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\ParkingArea;
use App\Models\ParkingSlot;
use App\Models\SubSection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $areasData = [
            [
                'name' => 'Area Parkir FILKOM',
                'slug' => 'filkom',
                'location' => 'Belakang Gedung A FILKOM UB',
                'image' => 'https://placehold.co/400x200/5B4EE6/white?text=FILKOM',
                'total_slots' => 60,
                'available_slots' => 0,
                'walking_minutes_from_filkom' => 1,
                'sub_sections' => [
                    [
                        'name' => 'Blok Utama Gedung A',
                        'slug' => 'blok-utama',
                        'total_slots' => 40,
                        'available_slots' => 0,
                        'rows' => ['A' => 10, 'B' => 10, 'C' => 10, 'D' => 10],
                        'available' => [],
                    ],
                    [
                        'name' => 'Samping Gedung F',
                        'slug' => 'samping-f',
                        'total_slots' => 20,
                        'available_slots' => 0,
                        'rows' => ['A' => 10, 'B' => 10],
                        'available' => [],
                    ],
                ],
            ],
            [
                'name' => 'Area Parkir EduTech',
                'slug' => 'edutech',
                'location' => 'Sebelah taman Edutech FILKOM UB',
                'image' => 'https://placehold.co/400x200/7C72F8/white?text=EduTech',
                'total_slots' => 54,
                'available_slots' => 6,
                'walking_minutes_from_filkom' => 3,
                'sub_sections' => [
                    [
                        'name' => 'Samping gedung E',
                        'slug' => 'samping-e',
                        'total_slots' => 30,
                        'available_slots' => 2,
                        'rows' => ['A' => 10, 'B' => 10, 'C' => 10],
                        'available' => ['A3', 'B7'],
                    ],
                    [
                        'name' => 'Samping taman EduTech',
                        'slug' => 'samping-taman',
                        'total_slots' => 24,
                        'available_slots' => 4,
                        'rows' => ['A' => 8, 'B' => 8, 'C' => 8],
                        'available' => ['A2', 'A5', 'B4', 'C6'],
                    ],
                ],
            ],
            [
                'name' => 'Kantin Creative Land (CL)',
                'slug' => 'kantin-cl',
                'location' => 'Area Kantin Creative Land UB',
                'image' => 'https://placehold.co/400x200/5B4EE6/white?text=Kantin+CL',
                'total_slots' => 45,
                'available_slots' => 18,
                'walking_minutes_from_filkom' => 7,
                'sub_sections' => [
                    [
                        'name' => 'Area Depan Kantin',
                        'slug' => 'depan-kantin',
                        'total_slots' => 25,
                        'available_slots' => 10,
                        'rows' => ['A' => 10, 'B' => 10, 'C' => 5],
                        'available' => ['A1', 'A4', 'A7', 'B2', 'B5', 'B8', 'B10', 'C1', 'C3', 'C5'],
                    ],
                    [
                        'name' => 'Samping Barat',
                        'slug' => 'samping-barat',
                        'total_slots' => 20,
                        'available_slots' => 8,
                        'rows' => ['A' => 10, 'B' => 10],
                        'available' => ['A2', 'A5', 'A8', 'A10', 'B1', 'B3', 'B6', 'B9'],
                    ],
                ],
            ],
            [
                'name' => 'Depan GOR Pertamina',
                'slug' => 'gor-pertamina',
                'location' => 'Depan GOR Pertamina UB',
                'image' => 'https://placehold.co/400x200/7C72F8/white?text=GOR',
                'total_slots' => 70,
                'available_slots' => 24,
                'walking_minutes_from_filkom' => 10,
                'sub_sections' => [
                    [
                        'name' => 'Sisi Selatan GOR',
                        'slug' => 'sisi-selatan',
                        'total_slots' => 40,
                        'available_slots' => 14,
                        'rows' => ['A' => 10, 'B' => 10, 'C' => 10, 'D' => 10],
                        'available' => ['A1', 'A5', 'A9', 'B2', 'B6', 'B10', 'C3', 'C7', 'C10', 'D1', 'D4', 'D7', 'D9', 'D10'],
                    ],
                    [
                        'name' => 'Sisi Timur',
                        'slug' => 'sisi-timur',
                        'total_slots' => 30,
                        'available_slots' => 10,
                        'rows' => ['A' => 10, 'B' => 10, 'C' => 10],
                        'available' => ['A2', 'A6', 'A10', 'B3', 'B7', 'C1', 'C4', 'C8', 'C9', 'C10'],
                    ],
                ],
            ],
            [
                'name' => 'Area Parkir FTP',
                'slug' => 'ftp',
                'location' => 'Belakang Gedung D dan E FTP UB',
                'image' => 'https://placehold.co/400x200/5B4EE6/white?text=FTP',
                'total_slots' => 40,
                'available_slots' => 4,
                'walking_minutes_from_filkom' => 12,
                'sub_sections' => [
                    [
                        'name' => 'Pojok Gedung D',
                        'slug' => 'pojok-d',
                        'total_slots' => 20,
                        'available_slots' => 2,
                        'rows' => ['A' => 10, 'B' => 10],
                        'available' => ['A4', 'B8'],
                    ],
                    [
                        'name' => 'Selasar Gedung E',
                        'slug' => 'selasar-e',
                        'total_slots' => 20,
                        'available_slots' => 2,
                        'rows' => ['A' => 10, 'B' => 10],
                        'available' => ['A6', 'B3'],
                    ],
                ],
            ],
            [
                'name' => 'Area Parkir PLD',
                'slug' => 'pld',
                'location' => 'Belakang Gedung PLD UB',
                'image' => 'https://placehold.co/400x200/7C72F8/white?text=PLD',
                'total_slots' => 35,
                'available_slots' => 12,
                'walking_minutes_from_filkom' => 8,
                'sub_sections' => [
                    [
                        'name' => 'Area Utama PLD',
                        'slug' => 'area-utama',
                        'total_slots' => 35,
                        'available_slots' => 12,
                        'rows' => ['A' => 10, 'B' => 10, 'C' => 10, 'D' => 5],
                        'available' => ['A1', 'A5', 'A8', 'B2', 'B6', 'B10', 'C3', 'C7', 'C9', 'D1', 'D3', 'D5'],
                    ],
                ],
            ],
        ];

        foreach ($areasData as $areaData) {
            $subSectionsData = $areaData['sub_sections'];
            unset($areaData['sub_sections']);

            $area = ParkingArea::create($areaData);

            foreach ($subSectionsData as $ssData) {
                $rows = $ssData['rows'];
                $available = $ssData['available'];
                unset($ssData['rows'], $ssData['available']);

                $subSection = $area->subSections()->create($ssData);

                foreach ($rows as $rowLabel => $count) {
                    for ($i = 1; $i <= $count; $i++) {
                        $code = $rowLabel . $i;
                        $isOccupied = !in_array($code, $available);

                        ParkingSlot::create([
                            'sub_section_id' => $subSection->id,
                            'code' => $code,
                            'row_label' => $rowLabel,
                            'row_number' => $i,
                            'is_occupied' => $isOccupied,
                        ]);
                    }
                }
            }
        }

        // Seed comments
        $comments = [
            ['slug' => 'filkom', 'author_name' => 'Andi M.', 'body' => 'Selalu penuh jam 8 pagi, coba datang lebih awal!', 'created_at' => '2026-11-10 08:00:00'],
            ['slug' => 'filkom', 'author_name' => 'Sari W.', 'body' => 'Parkiran terlalu padat, perlu diperluas.', 'created_at' => '2026-11-08 10:00:00'],
            ['slug' => 'edutech', 'author_name' => 'Reza P.', 'body' => 'Lumayan teduh, dekat taman jadi sejuk.', 'created_at' => '2026-11-12 09:00:00'],
            ['slug' => 'kantin-cl', 'author_name' => 'Dina A.', 'body' => 'Enak deket kantin, tapi siang penuh.', 'created_at' => '2026-11-09 12:00:00'],
            ['slug' => 'gor-pertamina', 'author_name' => 'Bagas K.', 'body' => 'Lapangan luas, jarang penuh.', 'created_at' => '2026-11-11 14:00:00'],
            ['slug' => 'ftp', 'author_name' => 'Mira S.', 'body' => 'Agak jauh dari FILKOM, tapi selalu ada slot.', 'created_at' => '2026-11-07 07:00:00'],
            ['slug' => 'pld', 'author_name' => 'Hadi N.', 'body' => 'Area parkir cukup rapi dan teratur.', 'created_at' => '2026-11-13 11:00:00'],
        ];

        foreach ($comments as $commentData) {
            $area = ParkingArea::where('slug', $commentData['slug'])->first();
            Comment::create([
                'parking_area_id' => $area->id,
                'user_id' => null,
                'author_name' => $commentData['author_name'],
                'body' => $commentData['body'],
                'created_at' => $commentData['created_at'],
                'updated_at' => $commentData['created_at'],
            ]);
        }
    }
}
