<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HotelsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('hotels')->insert([
      [
        'user_id' => 2,
        'url' => 'https://sunshinehotel.com',
        'postal_code' => '100-0001',
        'prefecture' => 'Tokyo',
        'city' => 'Chiyoda',
        'address' => '1-1-1 Kanda',
        'access' => '5 minutes from Kanda Station. Conveniently located near major train lines, with easy access to shopping, dining, and cultural landmarks.',
        'description' => 'A luxury hotel located in the heart of Tokyo. This elegant establishment offers state-of-the-art amenities, exceptional service, and breathtaking city views. Perfect for both business and leisure travelers, with spacious rooms and top-notch facilities.',
        'image_main' => 'https://example.com/images/sunshine_main.jpg',
        'image_sub1' => 'https://example.com/images/sunshine_sub1.jpg',
        'image_sub2' => 'https://example.com/images/sunshine_sub2.jpg',
        'image_sub3' => 'https://example.com/images/sunshine_sub3.jpg',
        'image_sub4' => 'https://example.com/images/sunshine_sub4.jpg',
        'cancellation_period' => 3,
        'general_fee' => 10,
        'sameday_fee' => 20,
        'breakfast_price' => 15.50,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      // 他のホテルデータをここに追加
      [
        'user_id' => 4,
        'url' => 'https://moonlightinn.com',
        'postal_code' => '150-0001',
        'prefecture' => 'Tokyo',
        'city' => 'Shibuya',
        'address' => '2-2-2 Dogenzaka',
        'access' => '10 minutes from Shibuya Station. Located in a vibrant area with easy access to shopping, dining, and entertainment hotspots, perfect for urban explorers.',
        'description' => 'A cozy inn in Shibuya. This charming establishment offers a blend of modern comfort and local flavor. Guests can enjoy stylish rooms, excellent service, and proximity to Tokyo\'s lively cultural scene. The inn features a communal lounge with a library, complimentary breakfast, and guided tours of Shibuya\'s iconic attractions. Perfect for solo travelers and couples, it provides a welcoming and convenient base to explore one of Tokyo\'s most dynamic neighborhoods.',
        'image_main' => 'images/hotel.jpg',
        'image_sub1' => 'images/hotel.jpg',
        'image_sub2' => 'images/hotel.jpg',
        'image_sub3' => 'images/hotel.jpg',
        'image_sub4' => 'images/hotel.jpg',
        'cancellation_period' => 2,
        'general_fee' => 15,
        'sameday_fee' => 25,
        'breakfast_price' => 12.50,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'user_id' => 6,
        'url' => 'https://starhotel.com',
        'postal_code' => '100-0002',
        'prefecture' => 'Tokyo',
        'city' => 'Chiyoda',
        'address' => '3-3-3 Marunouchi',
        'access' => '8 minutes from Tokyo Station. Strategically located for business travelers with quick access to major corporate and financial districts.',
        'description' => 'A business hotel near Tokyo Station. This hotel combines functionality with comfort, featuring modern rooms equipped for productivity and a range of business-friendly amenities. Guests can utilize meeting rooms, high-speed internet, and concierge services. The hotel\'s central location allows easy access to Tokyo\'s key business hubs and cultural landmarks. With its efficient design and attentive staff, it ensures a seamless stay for professionals and tourists alike.',
        'image_main' => 'images/hotel.jpg',
        'image_sub1' => 'images/hotel.jpg',
        'image_sub2' => 'images/hotel.jpg',
        'image_sub3' => 'images/hotel.jpg',
        'image_sub4' => 'images/hotel.jpg',
        'cancellation_period' => 1,
        'general_fee' => 20,
        'sameday_fee' => 30,
        'breakfast_price' => 10.00,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'user_id' => 7,
        'url' => 'https://galaxyhotel.com',
        'postal_code' => '100-0003',
        'prefecture' => 'Kyoto',
        'city' => 'Chiyoda',
        'address' => '4-4-4 Otemachi',
        'access' => '7 minutes from Otemachi Station. Situated in the heart of Tokyo\'s financial district, with panoramic city views and high-end facilities.',
        'description' => 'A high-end hotel with a view. This luxurious property offers elegantly designed rooms, impeccable service, and a range of exclusive amenities to cater to the discerning traveler. Guests can enjoy gourmet dining, a rooftop bar, and a state-of-the-art fitness center. Ideal for business travelers and leisure guests, the hotel provides an exquisite balance of comfort and sophistication.',
        'image_main' => 'https://example.com/images/galaxy_main.jpg',
        'image_sub1' => 'https://example.com/images/galaxy_sub1.jpg',
        'image_sub2' => 'https://example.com/images/galaxy_sub2.jpg',
        'image_sub3' => 'https://example.com/images/galaxy_sub3.jpg',
        'image_sub4' => 'https://example.com/images/galaxy_sub4.jpg',
        'cancellation_period' => 2,
        'general_fee' => 25,
        'sameday_fee' => 35,
        'breakfast_price' => 18.00,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'user_id' => 8,
        'url' => 'https://oceanviewresort.com',
        'postal_code' => '100-0004',
        'prefecture' => 'Kanagawa',
        'city' => 'Chiyoda',
        'address' => '5-5-5 Kudanminami',
        'access' => '15 minutes from Kudanshita Station. A tranquil retreat by the sea, perfect for relaxation and rejuvenation.',
        'description' => 'A seaside resort. Guests can unwind in spacious rooms with ocean views, indulge in gourmet dining, and take advantage of various recreational activities offered by the resort. The property features a private beach, water sports facilities, and wellness programs. Perfect for families and couples seeking a serene getaway, it offers a harmonious blend of luxury and nature.',
        'image_main' => 'https://example.com/images/oceanview_main.jpg',
        'image_sub1' => 'https://example.com/images/oceanview_sub1.jpg',
        'image_sub2' => 'https://example.com/images/oceanview_sub2.jpg',
        'image_sub3' => 'https://example.com/images/oceanview_sub3.jpg',
        'image_sub4' => 'https://example.com/images/oceanview_sub4.jpg',
        'cancellation_period' => 5,
        'general_fee' => 10,
        'sameday_fee' => 20,
        'breakfast_price' => 20.00,
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'user_id' => 9,
        'url' => 'https://mountainlodge.com',
        'postal_code' => '100-0005',
        'prefecture' => 'Hokkaido',
        'city' => 'Chiyoda',
        'address' => '6-6-6 Nagatacho',
        'access' => '10 minutes from Akasaka Station. Set in a serene mountainous area, providing a perfect escape from the city\'s hustle and bustle.',
        'description' => 'A lodge in the mountains. This hidden gem offers a cozy ambiance, personalized service, and stunning natural surroundings. Ideal for nature lovers and those seeking tranquility. The lodge provides guided hiking tours, farm-to-table dining experiences, and a relaxing onsen for ultimate rejuvenation. Its picturesque location and warm hospitality create an unforgettable retreat..',
        'image_main' => 'https://example.com/images/mountainlodge_main.jpg',
        'image_sub1' => 'https://example.com/images/mountainlodge_sub1.jpg',
        'image_sub2' => 'https://example.com/images/mountainlodge_sub2.jpg',
        'image_sub3' => 'https://example.com/images/mountainlodge_sub3.jpg',
        'image_sub4' => 'https://example.com/images/mountainlodge_sub4.jpg',
        'cancellation_period' => 3,
        'general_fee' => 15,
        'sameday_fee' => 25,
        'breakfast_price' => 17.50,
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
