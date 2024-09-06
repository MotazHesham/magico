<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        $cities = [
            [
                'name' => 'القاهرة',
                'country_id' => 63,
                'code' => 'C01',
                'cost' => 0,
                'predictions' => implode(',',['القاهرة', 'Cairo', 'كايرو', 'Cairow', 'كاهيرا'])
            ],
            [
                'name' => 'الإسكندرية',
                'country_id' => 63,
                'code' => 'C02',
                'cost' => 0,
                'predictions' => implode(',',['الإسكندرية', 'Alexandria', 'إسكندرية', 'إسكندر', 'الاسكندرية'])
            ],
            [
                'name' => 'الجيزة',
                'country_id' => 63,
                'code' => 'C03',
                'cost' => 0,
                'predictions' => implode(',',['الجيزة', 'Giza', 'الجيزه', 'جيزة', 'جيرة'])
            ],
            [
                'name' => 'المنصورة',
                'country_id' => 63,
                'code' => 'C04',
                'cost' => 0,
                'predictions' => implode(',',['المنصورة', 'Mansoura', 'المنصوره', 'المنصورة', 'منصورة'])
            ],
            [
                'name' => 'طنطا',
                'country_id' => 63,
                'code' => 'C05',
                'cost' => 0,
                'predictions' => implode(',',['طنطا', 'Tanta', 'طنطه', 'تنتا', 'طنطة'])
            ],
            [
                'name' => 'أسيوط',
                'country_id' => 63,
                'code' => 'C06',
                'cost' => 0,
                'predictions' => implode(',',['أسيوط', 'Asyut', 'أسيوط', 'أسيط', 'أسيوت'])
            ],
            [
                'name' => 'بني سويف',
                'country_id' => 63,
                'code' => 'C07',
                'cost' => 0,
                'predictions' => implode(',',['بني سويف', 'Beni Suef', 'بني سويس', 'بني سويف', 'بني سوف'])
            ],
            [
                'name' => 'السويس',
                'country_id' => 63,
                'code' => 'C08',
                'cost' => 0,
                'predictions' => implode(',',['السويس', 'Suez', 'السويس', 'سوس', 'سويز'])
            ],
            [
                'name' => 'دمياط',
                'country_id' => 63,
                'code' => 'C09',
                'cost' => 0,
                'predictions' => implode(',',['دمياط', 'Damietta', 'دمياط', 'دميات', 'دميات'])
            ],
            [
                'name' => 'شرم الشيخ',
                'country_id' => 63,
                'code' => 'C10',
                'cost' => 0,
                'predictions' => implode(',',['شرم الشيخ', 'Sharm El Sheikh', 'شرم الشیخ', 'شرم', 'شرم'])
            ],
            [
                'name' => 'الغردقة',
                'country_id' => 63,
                'code' => 'C11',
                'cost' => 0,
                'predictions' => implode(',',['الغردقة', 'Hurghada', 'الغردقة', 'حردقة', 'هورغادة'])
            ],
            [
                'name' => 'الزقازيق',
                'country_id' => 63,
                'code' => 'C12',
                'cost' => 0,
                'predictions' => implode(',',['الزقازيق', 'Zagazig', 'الزقازيق', 'زقازيق', 'زقزوق'])
            ],
            [
                'name' => 'الفيوم',
                'country_id' => 63,
                'code' => 'C13',
                'cost' => 0,
                'predictions' => implode(',',['الفيوم', 'Faiyum', 'الفيوم', 'فيوف', 'فيم'])
            ],
            [
                'name' => 'محافظة البحر الأحمر',
                'country_id' => 63,
                'code' => 'C14',
                'cost' => 0,
                'predictions' => implode(',',['محافظة البحر الأحمر', 'Red Sea Governorate', 'البحر الأحمر', 'البحر الاحمر', 'محافظة البحر الاحمر'])
            ],
            [
                'name' => 'العريش',
                'country_id' => 63,
                'code' => 'C15',
                'cost' => 0,
                'predictions' => implode(',',['العريش', 'Arish', 'العريش', 'العرش', 'عرش'])
            ],
            [
                'name' => 'المحلة الكبرى',
                'country_id' => 63,
                'code' => 'C16',
                'cost' => 0,
                'predictions' => implode(',',['المحلة الكبرى', 'Mahalla', 'المحلة', 'المحلة', 'محلة الكبرى'])
            ],
            [
                'name' => 'قنا',
                'country_id' => 63,
                'code' => 'C17',
                'cost' => 0,
                'predictions' => implode(',',['قنا', 'Qena', 'قنه', 'قنا', 'قينا'])
            ],
            [
                'name' => 'المنيا',
                'country_id' => 63,
                'code' => 'C18',
                'cost' => 0,
                'predictions' => implode(',',['المنيا', 'Minya', 'المنيا', 'منيا', 'منييا'])
            ],
            [
                'name' => 'سيوة',
                'country_id' => 63,
                'code' => 'C19',
                'cost' => 0,
                'predictions' => implode(',',['سيوة', 'Siwa', 'سيوه', 'سيواء', 'سيوة'])
            ],
            [
                'name' => 'بدر',
                'country_id' => 63,
                'code' => 'C20',
                'cost' => 0,
                'predictions' => implode(',',['بدر', 'Badr', 'بدر', 'بدر', 'بدور'])
            ],
            [
                'name' => 'البرج',
                'country_id' => 63,
                'code' => 'C21',
                'cost' => 0,
                'predictions' => implode(',',['البرج', 'El Borg', 'برج', 'البرج', 'بروج'])
            ],
            [
                'name' => 'أبو قير',
                'country_id' => 63,
                'code' => 'C22',
                'cost' => 0,
                'predictions' => implode(',',['أبو قير', 'Abu Qir', 'أبو كير', 'أبوقير', 'أبو قير'])
            ],
            [
                'name' => 'العباسية',
                'country_id' => 63,
                'code' => 'C23',
                'cost' => 0,
                'predictions' => implode(',',['العباسية', 'Abbassia', 'العباسيه', 'عباسية', 'عباسيه'])
            ],
            [
                'name' => 'الهرم',
                'country_id' => 63,
                'code' => 'C24',
                'cost' => 0,
                'predictions' => implode(',',['الهرم', 'Haram', 'الهرم', 'هرم', 'هرم'])
            ],
            [
                'name' => 'الزمالك',
                'country_id' => 63,
                'code' => 'C25',
                'cost' => 0,
                'predictions' => implode(',',['الزمالك', 'Zamalek', 'الزمالك', 'زمالك', 'زمالك'])
            ],
            [
                'name' => 'المنيا الجديدة',
                'country_id' => 63,
                'code' => 'C26',
                'cost' => 0,
                'predictions' => implode(',',['المنيا الجديدة', 'New Minya', 'المنيا الجديده', 'منيا الجديدة', 'المنيا'])
            ],
            [
                'name' => '6 أكتوبر',
                'country_id' => 63,
                'code' => 'C27',
                'cost' => 0,
                'predictions' => implode(',',['6 أكتوبر', 'October 6', '6th October', '6 أكتوبر', '6th Of October'])
            ],
            [
                'name' => 'الشروق',
                'country_id' => 63,
                'code' => 'C28',
                'cost' => 0,
                'predictions' => implode(',',['الشروق', 'El Shorouk', 'الشروخ', 'الشروق', 'الشروك'])
            ],
            [
                'name' => 'التجمع الخامس',
                'country_id' => 63,
                'code' => 'C29',
                'cost' => 0,
                'predictions' => implode(',',['التجمع الخامس', 'Fifth Settlement', 'التجمع الخامسة', 'التجمع الخامس', 'التجمع'])
            ],
            [
                'name' => 'حلوان',
                'country_id' => 63,
                'code' => 'C30',
                'cost' => 0,
                'predictions' => implode(',',['حلوان', 'Helwan', 'حلوان', 'حلوان', 'حلوان'])
            ],
            [
                'name' => 'مصر الجديدة',
                'country_id' => 63,
                'code' => 'C31',
                'cost' => 0,
                'predictions' => implode(',',['مصر الجديدة', 'New Cairo', 'مصر الجديده', 'مصر الجديدة', 'مصر'])
            ],
            [
                'name' => 'مصر القديمة',
                'country_id' => 63,
                'code' => 'C32',
                'cost' => 0,
                'predictions' => implode(',',['مصر القديمة', 'Old Cairo', 'مصر القديمه', 'مصر القديمة', 'مصر'])
            ],
            [
                'name' => 'المقطم',
                'country_id' => 63,
                'code' => 'C33',
                'cost' => 0,
                'predictions' => implode(',',['المقطم', 'Mokattam', 'المقطم', 'مقطم', 'مقطم'])
            ],
            [
                'name' => 'طوخ',
                'country_id' => 63,
                'code' => 'C34',
                'cost' => 0,
                'predictions' => implode(',',['طوخ', 'Tukh', 'طوخ', 'طوخ', 'طوخ'])
            ],
            [
                'name' => 'الواسطى',
                'country_id' => 63,
                'code' => 'C35',
                'cost' => 0,
                'predictions' => implode(',',['الواسطى', 'Wasta', 'الواسطه', 'واسطى', 'واسطى'])
            ],
            [
                'name' => 'بني عبيد',
                'country_id' => 63,
                'code' => 'C36',
                'cost' => 0,
                'predictions' => implode(',',['بني عبيد', 'Beni Ubaid', 'بني عبيد', 'بني عييد', 'بني عبيد'])
            ],
            [
                'name' => 'ديروط',
                'country_id' => 63,
                'code' => 'C37',
                'cost' => 0,
                'predictions' => implode(',',['ديروط', 'Deirout', 'ديروط', 'ديروط', 'ديروط'])
            ],
            [
                'name' => 'نجع حمادي',
                'country_id' => 63,
                'code' => 'C38',
                'cost' => 0,
                'predictions' => implode(',',['نجع حمادي', 'Nag Hammadi', 'نجع حمادي', 'نجع حمدى', 'نجع حمادى'])
            ],
            [
                'name' => 'القصير',
                'country_id' => 63,
                'code' => 'C39',
                'cost' => 0,
                'predictions' => implode(',',['القصير', 'Quseir', 'القصير', 'قصير', 'قصير'])
            ],
            [
                'name' => 'مطروح',
                'country_id' => 63,
                'code' => 'C40',
                'cost' => 0,
                'predictions' => implode(',',['مطروح', 'Matruh', 'مطروح', 'مطروح', 'مطروخ'])
            ],
            [
                'name' => 'ساحل سليم',
                'country_id' => 63,
                'code' => 'C41',
                'cost' => 0,
                'predictions' => implode(',',['ساحل سليم', 'Sahel Selim', 'ساحل سليم', 'ساحل سليم', 'ساحل'])
            ],
            [
                'name' => 'العياط',
                'country_id' => 63,
                'code' => 'C42',
                'cost' => 0,
                'predictions' => implode(',',['العياط', 'Al Ayat', 'عياط'])
            ], 
            [
                'name' => 'أسوان',
                'country_id' => 63,
                'code' => 'C44',
                'cost' => 0,
                'predictions' => implode(',',['أسوان', 'Aswan', 'اسوان'])
            ],
            [
                'name' => 'بورسعيد',
                'country_id' => 63,
                'code' => 'C45',
                'cost' => 0,
                'predictions' => implode(',',['بورسعيد', 'Port Said', 'بور سعيد'])
            ],
            [
                'name' => 'البحيرة',
                'country_id' => 63,
                'code' => 'C46',
                'cost' => 0,
                'predictions' => implode(',',['البحيرة', 'Beheira ', 'بحيرة', 'بحيره', 'البحيره'])
            ],
        ];

        DB::table('cities')->insert($cities);
    }
}
