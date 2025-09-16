<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**-------------------------------------------------------------------------
         * PAYMENT GATEWAY CREATE
         * -------------------------------------------------------------------------
         */

        DB::table('settings')->insert([
            [// ID->1 => SETTING
                'section_name' => 'Company',
                'image_path' => 'images/logo.png',
                'title' => 'Company Information',
                'description' => 'Dedicated team offering quality products, safe payments, and fast shipping for a great experience.',
                'string_0' => 'Icon ISL',
                'string_1' => 'Icon Information Systems Ltd.',
                'string_2' => 'Tower 2, Suite # 12/D, Confidence Centre, Dhaka 1212',
                'string_3' => 'info@iconisl.com',
                'string_4' => '02-55048474',
                'string_5' => '0172800058',
                'text_1' => 'http://iconisl.com.bd',
                'text_2' => 'https://maps.app.goo.gl/wt2b3mMTLf5afxVr9',
                'text_3' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4276.007242774361!2d90.42223416062632!3d23.792465767179415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7bc808ffffd%3A0xd5bbd38592a60a66!2sIcon%20Information%20Systems%20Ltd.!5e1!3m2!1sen!2sbd!4v1739083392364!5m2!1sen!2sbd',
                'text_4' => '© 2025 All Rights Reserved | Designed & Developed by',
                'json_collection' => json_encode([]),
                'pagination' => null,
                'status' => true
            ],
            [// ID->2 => SETTING
                'section_name' => 'Images',
                'image_path' => 'images/default/no-image.png',
                'title' => 'Logo or Default Images',
                'description' => 'Default Image && Logo',
                'string_0' => 'images/favicon.png',
                'string_1' => 'images/logo-black.png',
                'string_2' => 'images/logo-white.png',
                'string_3' => 'images/logo-left.png',
                'string_4' => 'images/logo-right.png',
                'string_5' => null,
                'text_1' => null,
                'text_2' => null,
                'text_3' => null,
                'text_4' => null,
                'json_collection' => json_encode([]),
                'pagination' => null,
                'status' => true
            ],
            [// ID->3 => SETTING
                'section_name' => 'Social Media',
                'image_path' => 'images/default/no-image.png',
                'title' => 'Find On Social Media',
                'description' => 'Social media is a way to communicate and share information online.',
                'string_0' => 'https://www.youtube.com/',
                'string_1' => 'https://www.facebook.com/',
                'string_2' => 'https://www.linkedin.com/',
                'string_3' => 'https://www.instagram.com/',
                'string_4' => null,
                'string_5' => null,
                'text_1' => null,
                'text_2' => null,
                'text_3' => null,
                'text_4' => null,
                'json_collection' => json_encode([]),
                'pagination' => null,
                'status' => true
            ]
        ]);
    }
}
