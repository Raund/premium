<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Category;
use App\Models\Lang;
use App\Models\User;
use App\Models\Text;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		$this->call('ArticlesSeeder');
        $this->call('CategoriesSeeder');
        $this->call('LangsSeeder');
        $this->call('UsersSeeder');
        $this->call('TextsSeeder');

	}

}

class ArticlesSeeder extends Seeder {

	public function run()
	{
		//DB::table('Articles')->delete();
        
		Article::create([
		    'category_id' => 2,
            'title' => 'Економ|Econom|',
            'description' => 'Просторий номер, облаштований усім необхідним для приємного проживання гостей. Від стандартного номеру відрізняється наявністю вішалки для одягу замість прихожої з шафою. Інтер’єр світлих відтінків, сучасні меблі, власна ванна кімната з душовою кабіною і косметичним набором.
Номер підходить для комфортного бюджетного відпочинку туристів, а також проживання працівників у відрядженні.

Зручності у номері:
•	Прихожа з вішалкою для одягу
•	Зона відпочинку зі столиком і двома кріслами
•	1 велике двоспальне або 2 окремих односпальних ліжка
•	Приліжкові тумби
•	Телевізор
•	Санвузол з душовою кабіною
•	Набір необхідних засобів гігієни у ванній кімнаті
•	Рушники|Spacious room equipped with everything needed for a pleasant stay of guests. It differs from the standart room only by the clothes hangers instead of the hallwaywith closet. The interior isin bright colors, modern furniture, a private bathroom with a shower and a cosmetic set.
Is suitable for a comfortable budget leisure of travelers and just forbusiness trips.

Amenities in the room:
•	Hallway with hanger
•	Recreation zone with table and two chairs
•	1 large double or 2 single beds
•	Bedside tables
•	TV
•	Bathroom with shower
•	Set of the required hygiene products in the bathroom
•	Towels|',
            'price' => 200,
            'quantity' => 2,
            'imgs' => '[]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
		]);

		Article::create([
		    'category_id' => 3,
            'title' => 'Дитяча ігрова кімната|Children\'s playroom|',
            'description' => 'Дитяча ігрова кімната
Інфраструктура готелю «Premium Club» у Яремчі спланована таким чином, щоб зробити сімейний відпочинок максимально цікавим та комфортним як для дітей, так і для їх батьків.
Гірське чисте повітря та чаруючий краєвид – це, безумовно, насолода найвищого ступеню. Проте далеко не кожну дитину можна зацікавити таким видом проводження часу.
Щоб проживання було корисним абсолютно для кожного мешканця готелю, ми облаштували дитячу розважальну кімнату. Тут наші маленькі гості можуть активно провести вільний час. Дорослі ж мають змогу побути на самоті, знаючи, що їх діти перебувають у безпечному та цікавому місці.
Переваги дитячої спортивної кімнати у готелі «Premium Club»:
•	Відвідування входить у вартість проживання.
•	Сучасне якісне обладнання для гри у настільний теніс і настільний футбол.
•	Приміщення спортзалу має безпечне та зручне килимове покриття.
Вартість відвідування дитячої кімнати для ігор:
•	Для мешканців готелю: безкоштовно.
Готель «Premium Club» у Карпатах – місце для активного сімейного відпочинку у горах. Відпочивайте разом з нами.|The infrastructure of the hotel «Premium Club» in Yaremche is planned to make a family vacation maximally interesting and comfortable both for children and for their parents.
Clean mountain air and charming landscape – it is certainly an ultimate pleasure. But not every child may be interested in such type of pastime.
To make stay at the hotel absolutely beneficial for each resident, we arranged the children\'s entertainment room. Here our little guests can actively spend their free time. Thus adults get the opportunity to stay alone, knowing that their children are in a safe and interesting place.
    Benefits of children\'s sports room in the hotel «Premium Club»:
• Visiting is included in the cost of residence.
• Modern high quality equipment for table tennis and table football playing.
• Sports room has a safe and comfortable carpet coverage.
The cost of visiting children\'s playroom:
• For residents of the hotel: free of charge.
    The hotel «Premium Club» in the Carpathians is a place for an active family holiday in the mountains. Relax with us.|',
            'price' => 100,
            'imgs' => '["upload\/articles\/2\/images\/2T0A2228.jpg","upload\/articles\/2\/images\/2T0A2257.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
		]);

		Article::create([
		    'category_id' => 4,
            'title' => 'Лекції лікаря стоматолога - Кулигіна Олега Борисовича|Lection of doctor|',
            'description' => 'Кулигін Олег Борисович Завідувач відділенням терапевтичної стоматології, Кандидат медичних наук, Лікар-стоматолог-терапевт, ІІ категорія, Лікар-стоматолог-ортопед.
Спеціалізується на наданні ендодонтичної допомоги з використанням операційного мікроскопу та конусно-променевого комп\'ютерного томографу. Видалення зламаних інструментів із кореневих каналів. Закриття перфорації зуба. Діагностика стану кореневих каналів.|
Kulyhin Oleg Head of Department dentistry, MD, dentist, therapist, II category, Dentist-orthopedist.
Specializes in providing dental care using the operating microscope and cone beam computer books scanner. Removal of broken instruments from root canals. Closure of perforation tooth. Diagnostics of root canals.|',
            'imgs' => '[]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
		]);
        Article::create([
            'category_id' => 1,
            'title' => 'Яскравий відпочинок у Карпатах|Unforgettable rest in Carpathians|',
            'description' => 'Українські Карпати – улюблене місце цінителів активного відпочинку як влітку, так і взимку.
Відпустка або вихідні в горах – це завжди незабутні краєвиди, чисті озера, високогірне повітря, стрімкі ріки та хвойні ліси, незалежно від пори року.
Зима в Карпатах пропонує безліч гірськолижних курортів з трасами різних рівнів складності та незмінно якісним обслуговуванням. До вподоби тут відпочивати і лижникам, і сноубордистам, також можна покататися на санках.  Влітку гори пропонують безліч варіантів активного проводження часу: альпінізм, рибалку, піші походи, прогулянки на велосипеді або квадроциклі. Літній та весняний сезони – ідеальний час для еко відпочинку в Західній Україні. Осінь найкраще підходить для любителів полювань, збору ягід та грибів. Такою ж популярністю, як місцевий відпочинок, користується лікування на оздоровчих курортах.
Неважливо, який сезон Ви обрали для відпочинку – Карпати завжди дарують безліч яскравих емоцій.
Яремче – популярний серед українців гірськолижний курорт. Щороку тут відпочивають тисячі співвітчизників та іноземців. Але славиться він не лише природою. Регіон зарекомендував себе як один із найгостинніших і найпривітніших. Місцеве населення чудово ставиться до приїжджих, завжди радо зустрічає і забезпечує комфортабельний прийом. Відпочинок у Яремчі залишає після себе виключно теплі та приємні спогади.
«Premium club» - комфортний готель у Карпатах
У горах та Прикарпатті є безліч варіантів готелів та котеджів, що пропонують свої послуги. Проте довіряти відпустку варто лише надійним та перевіреним.
Готель «Premium club» пропонує відпочинок у затишному куточку України – курорті Яремче. Для Вас пропонуємо:
•	Зручне розташування. Ми знаходимося неподалік від гірськолижних трас, що зручно для любителів активного зимнього відпочинку.
•	54 облаштовані номери різних категорій. Пропонуємо варіанти в залежності від Ваших потреб та фінансових побажань.
•	Простору територію та розвинену інфраструктуру готелю, що дозволяє гостям проводити час, не доставляючи дискомфорт один одному. «Premium club» підходить для дружніх компаній, для сімейної відпустки, а також для тих, хто бажає провести романтичний відпочинок в Карпатах на двох.
•	Активно розвинений спортивно-оздоровчий комплекс. У нас є відкритий та внутрішній басейни, спа-зона з хамамом, спорт зал для дорослих, кімната відпочинку для дітей.
•	Ресторан та бар з авторською кухнею, широкою картою напоїв та першокласним сервісом.
•	Сучасно обладнаний конференц зал для проведення різноманітних корпоративних заходів.
Бронюйте номер у готелі «Premium club» у Яремчі – ми надаємо VIP-відпочинок в Карпатах за доступною ціною.|Ukrainian Carpathians are known to be the favorite place of judges of active rest both in summer, and in winter.Vacation or weekend in the mountains - it\'s always unforgettable views, clean lakes, mountain air, abundant rivers and pine forests, regardless of the season.
    Winter in Carpathians offers many ski resorts with slopes of different difficulty levels and consistently good service. Skiers, and snowboarders likes to stay here.It is also possible to drive on sledges. In summertime mountains offer many options for active pastime: climbing, fishing, hiking, walks on a bicycle or quads. Summer and spring seasons are the perfect time for eco vacation in Western Ukraine. Autumn is best suited for fans of hunting, gathering berries and mushrooms. Equally popular as a local holiday is treatment at health resorts.
    No matter which season you choose to rest – Carpathians always give a lot of bright emotions.
    Yaremche is a popular Ukrainian ski resort. Annually thousands of compatriots and foreigners have a rest here. But it is famous not only for its nature. The region has established itself as one of the most hospitable and friendliest. A local population treats visitors very nice and pleasantly, always gladly meets and provides a comfortable reception.Rest in Yaremcheleaves only warm and pleasant memories.
    «Premium Club» - comfortable hotel in the Carpathians
There are many hotels and cottages in the mountains and the Carpathian region.However,tourists should trust only to reliable and tested ones.
        Hotel «Premium Club» offers a vacation in a cozy corner of Ukraine – the resort Yaremche. We offer:
• Convenient location. We are located near the ski slopes, which is convenient for fans of the winter active holidays.
• 54 furnished rooms of different categories. We offer variants depending on your needs and financial wishes.
• Spacious area and developed infrastructure of the hotel allow guests to spend time without bringing discomfort to each other. «Premium Club» is suitable for friendly companies, for a family vacation, and for those who wish to spend a romantic holiday for two in the Carpathian Mountains.
• Well-developed sports complex. We have an outdoor and indoor pools, a spa zone with hammam, gym for adultsand sport’s room for children.
• Restaurant and bar with authorial cuisine, extensive drinks card and first class service.
• Modernly equipped conference hall for various corporate events.
        Book a room inthe hotel «Premium club» in Yaremche and we will provide a VIP-rest in the Carpathians for an affordable price.|',
            'price' => 100,
            'imgs' => '["upload\/articles\/4\/images\/2T0A2176.jpg","upload\/articles\/4\/images\/2T0A2180.jpg","upload\/articles\/4\/images\/2T0A2200.jpg","upload\/articles\/4\/images\/2T0A2213.jpg","upload\/articles\/4\/images\/2T0A2228.jpg","upload\/articles\/4\/images\/2T0A2245.jpg","upload\/articles\/4\/images\/2T0A2257.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 2,
            'title' => 'Стандарт з балконом|Standard with balcony|',
            'description' => 'Найпопулярніша категорія для відпочинку у нашому готелі. Просторий номер, облаштований усім необхідним для комфортабельного розміщення відпочиваючих.
 У цій категорії номерів на Вас очікує стильний інтер’єр світлих відтінків, сучасні нові меблі (в тому числі зручне велике ліжко), індивідуальна ванна кімната з сучасною душовою кабіною та косметичним набором, балкон з панорамним видом на регіон Карпат.

Зручності у номері:
•	Прихожа з просторою шафою для одягу
•	Зона відпочинку зі столиком і двома кріслами
•	1 велике двоспальне або 2 окремих односпальних ліжка
•	Приліжкові тумби
•	Телевізор
•	Санвузол з душовою кабіною
•	Набір необхідних засобів гігієни у ванній кімнаті
•	Рушники
•	Балкон|The most popular category of stay in our hotel. Spacious room, equipped with everything necessary for comfortable accommodation of tourists.
Rooms In this category have stylish interior in bright colors, modern new furniture (including comfortable double bed), individual bathroom with a modern shower and a cosmetic set, balcony with panoramic views of the Carpathian region.

Amenities in the room:
• Hallway with a spacious wardrobe
• Recreation zone with table and two chairs
• 1 large double or 2 single beds
• Bedside tables
• TV
• Bathroom with shower
• Set of the required hygiene products in the bathroom
• Towels
• Balcony|',
            'price' => 400,
            'quantity' => 32,
            'imgs' => '["upload\/articles\/5\/images\/2T0A2378.jpg","upload\/articles\/5\/images\/standart wiyh balcon.jpg","upload\/articles\/5\/images\/standart.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 2,
            'title' => 'Напівлюкс|Junior|',
            'description' => 'Номер високого рівня комфорту. Чудовий вигляд із балкону. Оптимальний варіант розміщення для сімейного відпочинку з дітьми. Просторий, зручного та продумано обладнаний номер не створює незручностей при сумісному проживання.
У кожній кімнаті цієї категорії – дизайнерський сучасний інтер’єр у світлих тонах, достатній рівень освітлення (як штучного, так и природнього), панорамний вид з вікон та балкону.

Зручності у номері:
•	Прихожа з просторою шафою для одягу
•	Зона відпочинку зі столиком і двома кріслами
•	1 велике двоспальне ліжко і розкладний диван
•	Приліжкові тумби
•	Телевізор
•	Санвузол з душовою кабіною
•	Набір необхідних засобів гігієни у ванній кімнаті
•	Рушники
•	Балкон|Room of high level of comfort. Wonderful view from the balcony. The best accommodation option for families with children. Spacious, comfortable and thoughtfully equipped room creates inconveniences during cohabitation.
Each room in this category has a modern design in bright colors, adequate lighting (both artificial and natural), panoramic view from windows and balcony.

Amenities in the room:
• Hallway with a spacious wardrobe
• Recreation zone with table and two chairs
• 1 large double bed and sofa
• Bedside tables
• TV
• Bathroom with shower
• Set the required hygiene products in the bathroom
• Towels
• Balcony|',
            'price' => 600,
            'quantity' => 3,
            'imgs' => '[]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 2,
            'title' => 'Апартаменти|Apartment|',
            'description' => 'Проживання у апартаментах нашого готелю забезпечить Вам ексклюзивний VIP-відпочинок за відносно доступною ціною. Ця категорія номерів передбачає наявність власної кухонної зони з усім необхідним для приготування їжі. Особливо це зручно при проживанні з маленькими дітьми. У номері облаштована власна вітальня.
Світлі, просторі номери з сучасними меблями, ванна кімната з душовою кабіною та косметичним набором.

Зручності у номері:
•	Двокімнатний номер
•	Прихожа з просторою шафою для одягу
•	Вітальня
•	Зона відпочинку зі столиком і двома кріслами
•	Власна кухня, облаштована меблями, раковиною та набором посуду
•	1 велике двоспальне ліжко і розкладний диван
•	Приліжкові тумби
•	Телевізор
•	Санвузол з душовою кабіною
•	Набір необхідних засобів гігієни у ванній кімнаті
•	Рушники
•	Балкон|In the apartments of the hotel you get an exclusive VIP-rest for a relatively affordable price. In this category of rooms there is own kitchen area with everything needed for cooking. This is especially convenient for staying with small children. The room is equipped with its own living room.
Bright, spacious rooms with modern furniture, bathroom with shower and a cosmetic set.

Amenities in the room:
• Consist of two rooms
• Hallway with a spacious wardrobe
• Living room
• Recreation area with table and two chairs
• Own kitchen, equipped with furniture, sink and a set of dishes
• 1 large double bed and sofa
• Bedside tables
• TV
• Bathroom with shower
• Set of the required hygiene products in the bathroom
• Towels
• Balcony|',
            'price' => 800,
            'quantity' => 13,
            'imgs' => '["upload\/articles\/7\/images\/apartaments with kitchen.jpg","upload\/articles\/7\/images\/apartaments with kitchen1.jpg","upload\/articles\/7\/images\/apartaments with kitchen3.jpg","upload\/articles\/7\/images\/watercloset apart.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 2,
            'title' => 'Люкс|Luxe|',
            'description' => 'Категорія номерів, передбачена для проживання VIP-клієнтів або бізнес-гостей при проведенні корпоративних конференцій та семінарів. Від інших категорій відрізняється в першу чергу виокремленою спальнею. В такому номері особливо зручно розміщуватися сім’ї з дітьми. Так, відпочиваючи разом, батьки та діти мають змогу проводити вільний час у номері, не заважаючи один одному. Також у цій категорії наявна власна вітальня.

Зручності у номері:
•	Двокімнатний номер з окремою спальнею
•	Прихожа з просторою шафою для одягу
•	Вітальня
•	Зона відпочинку зі столиком і двома кріслами
•	1 велике двоспальне і розкладний диван
•	Приліжкові тумби
•	Телевізор
•	Санвузол з душовою кабіною
•	Набір необхідних засобів гігієни у ванній кімнаті
•	Рушники
•	Балкон|Room categories provided accommodation for VIP-clients or business guests during corporate conferences and seminars. From other categories differs primarily singled bedroom. In this room is conveniently placed especially families with children. So, relaxing together, parents and children are able to spend their free time in a room without interfering each other. Also in this categorythere is own living room.

Amenities in the room:
• Double room with separate bedroom
• Hallway with a spacious wardrobe
• Living room
• Recreation area with table and two chairs
• 1 large double bed and sofa
• bedside tables
• TV
• A bathroom with shower
• Set of the required hygiene products in the bathroom
• Towels
• Balcony|',
            'price' => 1000,
            'quantity' => 3,
            'imgs' => '[]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 2,
            'title' => 'Дворівневі апартаменти|Duplex apartment|',
            'description' => 'Для дійсно ексклюзивного відпочинку пропонуємо зупинитися у дворівневих апартаментах. Є власна кухня, облаштована необхідними меблями та посудом, що дозволяє самостійно готувати у будь-який зручний час.
Комфортне м’яке ліжко, гармонічно підібрані під інтер’єр меблі, вид з номеру на гори, простора ванна кімната – це те, що незмінно доставляє фізичне та естетичне задоволення від відпочинку.

Зручності у номері:
•	Двокімнатний дворівневий номер
•	Прихожа з просторою шафою для одягу
•	Вітальня
•	Зона відпочинку зі столиком і двома кріслами
•	Власна кухня, облаштована меблями, раковиною та набором посуду
•	1 велике двоспальне ліжко і розкладний диван
•	Приліжкові тумби
•	Телевізор
•	Санвузол з душовою кабіною|For a really exclusive holiday offer to stay in the duplex apartment. There is own kitchen, equipped with necessary furniture and utensils, allowing you to cook at any convenient time.
Comfortable soft bed, harmoniously match the interior furniture, room view from the mountains, spacious bathroom - a fact that always delivers physical and aesthetic pleasureduring the holiday.

Amenities in the room:
• Two two-level rooms
• Hallway with a spacious wardrobe
• Living room
• Recreation area with table and two chairs
• Own kitchen, equipped with furniture, sink and a set of dishes
• 1 large double bed and sofa
• bedside tables
• TV
• Bathroom with shower
• Set of the required hygiene products in the bathroom
• Towels
• Balcony|',
            'price' => 1200,
            'quantity' => 1,
            'imgs' => '[]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 3,
            'title' => 'Зовнішній басейн з підігрівом|Heated outdoor pool|',
            'description' => 'Інфраструктура готелю «Premium Club» влаштована так, що гості можуть з користю проводити час незалежно від сезону. Відпочинок літом надає Вам можливість скористатися послугами нашого відкритого басейну з підігрівом.
Переваги зовнішнього басейну у готелі «Premium Club»:
•	Відвідування басейну входить у вартість проживання.
•	Безкоштовно надаємо шезлонги та рушники.
•	У прохолодну та вітряну погоду працює система підігріву. Вода нагрівається до зручної для тіла температури – 26-28 градусів за Цельсієм.
•	Розташований на відкритій галявині з панорамним краєвидом на гори.
•	Обладнаний сучасною системою очищення води.
Плавання – це дієвий спосіб позбавитися від стресу, зміцнити нервову систему та покращити фізичну форму. Крім того, відкритий басейн дає можливість розташуватися на шезлонзі біля води, милуватися краєвидом гір та пити прохолодні напої під теплими променями сонця.
Якщо Ви плануєте сімейний відпочинок з дітьми, рекомендуємо взяти з собою іграшки і спорядження для купання.
Вартість відвідування басейну:
•	Для мешканців готелю: безкоштовно.
•	Для сторонніх відвідувачів: дорослі – 100 грн/2 години; діти старше 5 років – 50 грн/2 години. Для дітей віком до 5 років відвідування басейну безкоштовне.
Плаваючи, Ви зміцнюєте здоров\'я і отримуєте задоволення. Насолоджуйтесь свіжим гірським повітрям і оздоровлюйтеся в готелі «Premium Club» у Яремчі.|Hotel «Premium Club» amenities are designed so that guests can spend their time usefully and regardless of the season.  Summer vacations give you an opportunity to make use of our heated outdoor pool.
    Advantages of external pool at «Premium Club»:
• Visiting of the pool is included in the price of living.
• Deck-chairs and towels: free of charge.
• In cold and windy weather a pool is heated. The water is warmed up to a comfortable for body temperature - 26-28 degrees on Celsius.
• Located on an open lawn with panoramic mountain views.
• Equipped with modern water purification system.
    Swimming is an effective way to relieve stress, strengthen the nervous system and improve a physical form. In addition, outdoor pool provides an opportunity to sit on the loungers near the water, enjoy views of mountains and drink soft drinks under the warm sun.
If you are planning a family vacation with children, we recommend you to bring toys and gear for swimming.
                                                                                                 The cost of swimming pool:
• For residents of the hotel: free of charge.
• For other visitors: adults - 100 UAH / 2 hours; children older than 5 years - 50 UAH / 2 hours. For children under 5 years: free of charge.
    You strengthen health and have fun by swimming. Enjoy the fresh mountain air and improve your health in the hotel «Premium Club» in Yaremche.|',
            'price' => 100,
            'imgs' => '["upload\/articles\/10\/images\/2T0A2177.jpg","upload\/articles\/10\/images\/2T0A2180.jpg","upload\/articles\/10\/images\/2T0A2186.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 3,
            'title' => 'Конференц-зал|Conference hall|',
            'description' => 'Послугами готелю «Premium Club» у Яремчі регулярно користуються організації з метою проведення на його території різноманітних корпоративних заходів: семінарів, тренінгів, переговорів, презентацій або невеликих групових нарад.
Переваги використання конференц залу у готелі «Premium Club»:
•	Просторе приміщення загальною площею 40 м2.
•	Зручне розташування. Конференц зал знаходиться на першому поверсі готелю.
•	Підходить для досить численних заходів. Максимально допустима кількість місць для посадки – 40.
•	У залі передбачене як природнє, так і штучне освітлення.
Особливості територіального розташування готелю, його широка інфраструктура, сучасне технологічне обладнання, а також привітний і турботливий персонал забезпечать гостей заходу усім необхідним для роботи та відпочинку.
Вартість використання конференц залу:
•	Для кожного заходу вартість бронювання розраховується індивідуально.
Конференц послуги від готелю «Premium Club» у Карпатах – це гарантія проведення Вашого корпоративного заходу на високому рівні.|Services of hotel "Premium Club" in Yaremche are regularly used by organizations for realization of various corporate events on its territory: seminars, trainings, negotiations, presentations or small group conferences.
Advantages of a conference hall in the hotel «Premium Club»:
• Spacious apartment with total area of 40 m2.
• Convenient location. Conference hall is located on the first floor.
• Suitable for quite big events. The maximum number of seats – 40.
• Both natural and artificial illumination is available.
Features of territorial location of the hotel, its extensive infrastructure, modern technical equipment and friendly and dedicated staff will provide guests with all necessities for work and leisure.
The cost of using the conference hall:
• Price of the hall booking is accounted individually for each event.
Conference services of the hotel «Premium Club» in Carpathians is the guarantee of realization of your corporate event at high level.|',
            'price' => 200,
            'imgs' => '["upload\/articles\/11\/images\/conf2.jpg","upload\/articles\/11\/images\/conf3.jpg","upload\/articles\/11\/images\/conf4.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 3,
            'title' => 'Парковка та охорона|Parking and guard|',
            'description' => 'Активний відпочинок у горах передбачає велику кількість походів та поїздок. Для зручності більшість відвідувачів «Premium Club» у Яремчі приїжджають на власному автомобілі, тому на території готелю облаштований зручний паркінг.
Крім надання нашим гостям комфортного проживання та достатнього вибору розваг, ми також піклуємося про рівень безпеки. З цією метою на території «Premium Club» цілодобово працює охорона.
Переваги автопарковки у готелі «Premium Club»:
•	Паркування входить у вартість проживання.
•	Розташована прямо на території готелю, немає необхідності витрачати дорогоцінний час, щоб її дістатися.
•	Облаштована достатня кількість місць для паркування машин.
•	Проводиться цілодобовий відеонагляд. Камери працюють як на самій території готелю, так і за її межами.
Вартість користування стоянкою для автомобілів:
•	Для мешканців готелю: безкоштовно на весь період проживання.
Обираючи відпочинок у готелі «Premium Club» у Яремчі, Ви можете бути впевнені як у своїй безпеці, так і у збереженні свого авто та іншого цінного майна.|Active rest in mountains involves plenty of hikes and journeys. For convenience, most visitors of "Premium Club" in Yaremche come here by car, that’s why the hotel is equipped with a modern parking.
In addition to providing our guests with comfortable accommodation and ample choice of entertainments, we also care about safety. For this purpose, we have a 24/7 security on the territory of «Premium Club».
Advantages of car parking at the hotel «Premium Club»:
• Parking is included in the cost of residence.
• Is located directly near the hotel, no need to waste precious time to get there.
• Arranged sufficient quantity of parking lots.
• A 24/7 video surveillance is held. Cameras work both on territory of hotel and beyond.
Cost of car parking usage:
• For residents of the hotel: free of charge for the entire stay.
Choosing the hotel "Premium Club" in Yaremche for rest, you can repose both in the safety and in maintenance of your auto and other valuable property.|',
            'price' => 20,
            'imgs' => '["upload\/articles\/12\/images\/2T0A2291.jpg","upload\/articles\/12\/images\/2T0A2293.jpg","upload\/articles\/12\/images\/2T0A2296.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 3,
            'title' => 'Ресторан та бар|Restaurant and bar|',
            'description' => 'Готель «Premium Club» у Яремчі пропонує своїм гостям скористатися послугами ресторану та бару, розташованими на території. Сучасний інтер\'єр, авторська кухня, затишна атмосфера, приємна музика та професійне обслуговування – у нас є все, щоб гості  отримували максимальний комфорт від відпочинку.
    Переваги ресторану/бару у готелі «Premium Club»:
•	Надзвичайно смачна кухня. Всі страви ми готуємо самостійно. Головний акцент нашої кухні – використання виключно свіжих та якісних продуктів.
•	Багатонаціональне меню. Наші гості мають можливість обрати страви як національної української, так і європейської кухні.
•	Широка карта напоїв у різних цінових категоріях.
•	Стильний та сучасний дизайн, чудовий панорамний вид із вікон.
•	Загальна місткість ресторану – 100 осіб. Так, завдяки достатній кількості місць для посадки наші гості ніколи не заважають один одному. У нашому ресторані є можливість без будь-якого дискомфорту одночасно розміститися численній компанії та романтичній парі для усамітненого відпочинку.
    Вартість відвідування ресторану:
•	Для мешканців готелю бронювання ресторану безкоштовне. Вартість страв та напоїв – згідно діючого прейскуранту.
    Обирайте відпочинок у готелі «Premium Club» у Яремчі, щоб удосталь насолодитися гірським повітрям, мальовничим краєвидом та авторською смачною кухнею.|Hotel «Premium Club» in Yaremche offers its guests to take advantage of the services of restaurant and bar, located on territory. Modern interior, authorial cuisine, cozy atmosphere, nice music and professional service – we have everything needed for a maximal comfort of our dear guests.
    Benefits of restaurant / bar in the hotel «Premium Club»:
• Extremely delicious food. We cook all the dishes ourselves. The main rule of our kitchen is using only fresh and quality products.
• Multinational menu. Our guests can choose dishes both of national Ukrainian and European cuisine.
• Wide drinks card in different price categories.
• Stylish and modern design, wonderful panoramic view from windows.
• The total capacity of the restaurant - 100 people. So, due to sufficient number of seats our guests never interfere with each other. In our restaurant is possible to simultaneously accommodate numerous companies and romantic pair seeking for a secluded holiday without any discomfort.
    Cost of visiting the restaurant:
• For the habitants of hotel reserving of restaurant is free of charge. Cost of foods and drinks – according to the current price-list.
Choose a vacation at «Premium Club» in Yaremche to enjoy mountain air, picturesque landscape and authorial cuisine.|',
            'price' => 100,
            'imgs' => '["upload\/articles\/13\/images\/launch.jpg","upload\/articles\/13\/images\/rest.jpg","upload\/articles\/13\/images\/rest3.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        
        Article::create([
            'category_id' => 3,
            'title' => 'Спа-зона|Spa zone|',
            'description' => 'Головне, що бажає відчути кожна людина після відпочинку у горах – гармонію, душевний спокій, позбавлення від стресу та заряд позитивної енергії. Найкращий спосіб, що допомагає досягти перерахованих відчуттів – проведення часу у зоні релаксу. Погодьтесь – немає нічого кращого, аніж морозним вечором зігрітись у бані, поплавати у басейні та випити чашку трав’яного чаю у компанії близьких.
Крім насолоди такий відпочинок приносить надзвичайну користь для здоров’я – виводить з організму шкідливі речовини, сприяє розслабленню та відновленню м’язів.
Для досягнення максимальної насолоди та оздоровлення відпочиваючих на території готелю «Premium Club» у Яремчі облаштована комфортабельна сучасна спа-зона.
Зона спа-відпочинку у «Premium Club» включає:
•	Хамам (турецьку баню), оформлену в оригінальному дизайні.
•	Закритий басейн з підігрівом.
•	Кімнату для відпочинку.
•	Душові кабіни та санвузли.
Максимальна кількість відвідувачів – 6 дорослих або 4 дорослих + 3 дітей.
Вартість відвідування спа-зони:
•	У теплий сезон – 300 грн/год.
•	У зимовий період – 400 грн/год.
•	Вказана вартість включає користування кімнатою відпочинку, турецькою банею, внутрішнім басейном, душовими кабінами та туалетом.
Запрошуємо оздоровитися, отримати заряд сил та бадьорості у спа-зоні готелю ««Premium Club» у Карпатах.|Mainly, after the rest in mountains everyone wants to feel harmony, peace of mind, privation from stress and charge of positive energy. The best way to get these feelings is to spend time in the relaxation zone. Obviously, there is nothing better than to get warm in a bath-house, swim in the pool and drink a cup of herbal tea in the company of close friend in the frosty winter evening.
Such rest is not only pleasant but really good for your health as well, as it destroys harmful substances in an organism, assists relaxation and restoring of muscles.
For maximum enjoyment and recreation of tourists of the hotel «Premium Club» in Yaremche a comfortable modern spa area is equipped there.
Zone of spa in «Premium Club» includes:
• Hamam (Turkish bath), decorated in the original design.
• Indoor heated pool.
• Lounge.
• Showers and WC.
The maximum number of visitors – 6 adults or 4 adults + 3 children.
The cost of the spa zone:
• In the warm season – 300 UAH / hour.
• In winter – 400 UAH / hour.
• The price includes using of a lounge, Turkish bath, indoor swimming pool, shower and WC.
We invite you to improve your health, get a boost of energy and strength in the spa of the hotel «Premium Club» in the Carpathians.|',
            'price' => 300,
            'imgs' => '["upload\/articles\/14\/images\/2T0A2302.jpg","upload\/articles\/14\/images\/2T0A2372.jpg","upload\/articles\/14\/images\/2T0A2378(1).jpg","upload\/articles\/14\/images\/2T0A2378.jpg","upload\/articles\/14\/images\/2T0A2392(1).jpg","upload\/articles\/14\/images\/2T0A2392.jpg","upload\/articles\/14\/images\/hamam pool.jpg","upload\/articles\/14\/images\/hamam.jpg","upload\/articles\/14\/images\/hamam1.jpg","upload\/articles\/14\/images\/hamam3.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);

        Article::create([
            'category_id' => 3,
            'title' => 'Спорт зал|Gym|',
            'description' => 'Важлива частина інфраструктури готелю «Premium Club» у Яремчі – тренажерний зал. Ми знаємо: людина, яка слідкує за своєю фізичною формою та здоров’ям, навіть у період відпочинку не залишає спорт. Тому вирішили попіклуватися про своїх гостей та облаштувати комфортабельний спортивний зал с усім необхідним спорядженням.
Переваги тренажерного залу у готелі «Premium Club»:
•	Відвідування входить у вартість проживання.
•	Якісне обладнання для різних видів фізичної активності: боксерська груша, велодоріжка, бігова доріжка, штанга, гантелі.
•	Можна відвідувати у будь-який зручний час.
•	Приміщення спортзалу має безпечне та зручне килимове покриття.
•	Сучасна вентиляційна система, що гарантує свіже та чисте повітря у залі.
Заняття спортом на місцевості з освіжаючим гірським кліматом – це можливість відновити гармонію тіла і духу під час відпочинку.
Вартість відвідування спортзалу:
•	Для мешканців готелю: безкоштовно.
Чудовий вигляд і настрій – показники якісного та корисного відпочинку. Насолоджуйтесь та оздоровлюйтесь разом з «Premium Club» у Яремчі.|Gym is an important part of the hotel «Premium Club» in Yaremche infrastructure. We know that everyone who cares about his physical form and health, even while vacations does not abandon sport. So we decided to take care of our guests and equip a comfortable gym with all necessary equipment.
Advantages of the gym in the hotel «Premium Club»:
• Visiting included in the cost of residence.
• High-quality equipment for different types of physical activity: punching bag, bicycle track, treadmill, barbell, dumbbells.
• Is possible to visit in any convenient time.
• Gym room has safe and comfortable carpet coverage.
• Modern ventilation system that guarantees fresh and clean air in the room.
Doing sports in a refreshing mountain climate is a possibility to restore harmony of body and spirit during the rest.
The cost of the gym:
• For residents of the hotel: free of charge.
A wonderful look and good mood are indicators of quality and useful rest. Enjoy and improve your health with «Premium Club» in Yaremche.|',
            'price' => 150,
            'imgs' => '["upload\/articles\/15\/images\/2T0A2453.jpg","upload\/articles\/15\/images\/2T0A2456.jpg"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
        Article::create([
            'category_id' => 4,
            'title' => 'Святкування колективом Хмельницької Міської Першої Аптеки дня фармацевтичного працівника та здобутя ними звання "Аптека Року 2016"|',
            'description' => 'Шановні фармацевтичні працівники!
Щиро вітаємо Вас з професійним святом!
Важливою і значущою є Ваша повсякденна, гуманна місія – забезпечувати людей ліками.
Ваш професіоналізм, вміння знаходити оптимальні рішення повертають людям здоров’я, додають впевненості у власних силах та віри в життя.
Переконані, що ваша відданість справі, фаховий досвід, глибокі знання і динамізм завжди поєднуватимуться із щирим співчуттям до людей, милосердям та благодійністю у кращих гуманітарних традиціях.
Зичимо вам усіляких гараздів, здійснення заповітних мрій, оптимізму, нових звершень і перемог!
P.S. Окреме вітання адресоване Хмельницькій Міській Першій Аптеці зі здобуттям звання "Аптека Року 2016"!
Дякуємо, що обрали саме наш заклад для святкування цієї визначної дати! Цінуємо Ваш вибір і зробимо все, щоб цей день став частинкою приємних та щасливих спогадів у Вашому житті!|Dear pharmaceutical workers!
We congratulate you on your professional holiday!
An important and significant is your everyday, humane mission - to provide people medicine.
Your professionalism, ability to find optimal solutions turn people\'s health, give self-confidence and faith in life.
    We are convinced that your dedication, professional experience, knowledge and dynamism always be combined with sincere compassion for people, compassion and charity in the best humanitarian tradition.
    We wish you all the best, realization of the cherished dreams, optimism, new achievements and victories!
    P.S. Special congratulations addressed Khmelnytsky City First pharmacy on winning the title of "Pharmacy of the Year 2016"!
    Thank you chose our establishment to celebrate this outstanding date! We appreciate your choice and will do anything to become part of the day pleasant and happy memories in your life!|',
            'price' => 150,
            'imgs' => '["upload\/articles\/16\/images\/DSC1654.JPG"]',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'date' => DB::raw('CURRENT_TIMESTAMP'),
            'active' => true,
        ]);
	}

}

class CategoriesSeeder extends Seeder {

    public function run()
    {
       DB::table('Categories')->delete();

       Category::create([
            'id' => "1",
            'name' => 'Готелі',
            'link' => 'hotel',
            'fields' => '["title","description","gallery"]',
        ]);

        Category::create([
            'id' => "2",
            'name' => 'Кімнати',
            'link' => 'rooms',
            'fields' => '["title","description","gallery","price","quantity","active"]',
        ]);

        Category::create([
            'id' => "3",
            'name' => 'Послуги',
            'link' => 'services',
            'fields' => '["title","description","meta_title","meta_description","gallery","active","price"]',
        ]);

        Category::create([
            'id' => "4",
            'name' => 'Події',
            'link' => 'events',
            'fields' => '["title","description","meta_title","meta_description","gallery","date","active"]',
        ]);

        Category::create([
            'id' => "5",
            'name' => 'Галерея',
            'link' => 'gallery',
            'fields' => '["title","description","meta_title","meta_description","gallery","date","active"]',
        ]);

        Category::create([
            'id' => "6",
            'name' => 'Слайдер',
            'link' => 'slider',
            'fields' => '["title","description","meta_title","meta_description","gallery","date","active"]',
        ]);
    }

}

class LangsSeeder extends Seeder {

    public function run()
    {
        DB::table('langs')->delete();

        Lang::create([
            'lang' => 'ua',
        ]);

        Lang::create([
            'lang' => 'en',
        ]);

        /*Lang::create([
            'lang' => 'ru',
        ]);*/

    }

}

class UsersSeeder extends Seeder {

    public function run()
    {
        DB::table('Users')->delete();

        User::create([
            'name' => 'admin',
            'email' => 'raun@i.ua',
            'password' => '$2y$10$KCR5WbIyUHXgZbsthDHHHOJgtdcmTA2Um.eXHbRwnvBWRgcJN/0O.',
        ]);

        User::create([
            'name' => 'root',
            'email' => 'webdesignstudio@gmail.com',
            'password' => '$2y$10$BdvnOe9NrHYCkipriMsBRuvfVrOGQI0oi7XzPHQSQ42pUpJGg4Q6y',
        ]);
    }

}
class TextsSeeder extends Seeder {

    public function run()
    {
        DB::table('Texts')->delete();

        Text::create([
            'page_id' => '0',
            'type' => 'input',
            'title' => 'Контактний номер телефону',
            'description' => '+380673433400',
            'priority' => '5',
        ]);

        Text::create([
            'page_id' => '0',
            'type' => 'input',
            'title' => 'Адреса',
            'description' => '78500, м.Яремче, вул Довбуша, 50, Івано-Франківська обл',
            'priority' => '5',
        ]);

        Text::create([
            'page_id' => '0',
            'type' => 'input',
            'title' => 'Пошта',
            'description' => 'premiumclub2016@gmail.com',
            'priority' => '5',
        ]);
        Text::create([
            'page_id' => '0',
            'type' => 'textarea',
            'title' => 'Карта',
            'description' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2646.2322262355638!2d24.54735901607702!3d48.452073679249864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4737243786ff61dd%3A0xf33ec5bfe685c550!2z0LLRg9C70LjRhtGPINCe0LvQtdC60YHQuCDQlNC-0LLQsdGD0YjQsCwgNTAsINCv0YDQtdC80YfQtSwg0IbQstCw0L3Qvi3QpNGA0LDQvdC60ZbQstGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCDQo9C60YDQsNC40L3QsCwgNzg1MDA!5e0!3m2!1sru!2sru!4v1475842190928" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'priority' => '6',
        ]);
    }

}


