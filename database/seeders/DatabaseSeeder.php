<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Destination;
use App\Models\TourCategory;
use App\Models\TourPackage;
use App\Models\VisaService;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\BlogPost;
use App\Models\GalleryItem;
use App\Models\Review;
use App\Models\Faq;
use App\Models\Coupon;
use App\Models\FlightBookingRequest;
use App\Models\CustomTourRequest;
use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Users
        $admin = User::create([
            'name' => 'GoTravel Admin',
            'email' => 'admin@gotravel.com',
            'phone' => '+8801712345678',
            'role' => 'admin',
            'address' => 'Gulshan 2, Dhaka-1212, Bangladesh',
            'passport_number' => 'A09876543',
            'password' => Hash::make('password'),
        ]);

        $customer = User::create([
            'name' => 'Tanvir Ahmed',
            'email' => 'user@gotravel.com',
            'phone' => '+8801812345678',
            'role' => 'customer',
            'address' => 'Dhanmondi 32, Dhaka, Bangladesh',
            'passport_number' => 'B01234567',
            'password' => Hash::make('password'),
        ]);

        // 2. Destinations
        $destinations = [
            [
                'name' => 'Bangladesh',
                'slug' => 'bangladesh',
                'country' => 'Bangladesh',
                'flag_code' => 'bd',
                'image_url' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80',
                'description' => 'Explore the scenic beaches of Cox\'s Bazar, cloud kingdom of Sajek, lush tea gardens of Sylhet, and green hills of Bandarban.',
                'is_popular' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Dubai',
                'slug' => 'dubai',
                'country' => 'United Arab Emirates',
                'flag_code' => 'ae',
                'image_url' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=800&q=80',
                'description' => 'Experience futuristic architecture, luxury shopping, desert safari, and world-class attractions in the city of gold.',
                'is_popular' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Thailand',
                'slug' => 'thailand',
                'country' => 'Thailand',
                'flag_code' => 'th',
                'image_url' => 'https://images.unsplash.com/photo-1506665531195-3566af294817?auto=format&fit=crop&w=800&q=80',
                'description' => 'Discover tropical beaches, royal palaces, ornate temples, vibrant night markets, and delicious street food.',
                'is_popular' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Malaysia',
                'slug' => 'malaysia',
                'country' => 'Malaysia',
                'flag_code' => 'my',
                'image_url' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?auto=format&fit=crop&w=800&q=80',
                'description' => 'Visit iconic Petronas Twin Towers, cool Genting Highlands, cultural Penang, and pristine beaches of Langkawi.',
                'is_popular' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Singapore',
                'slug' => 'singapore',
                'country' => 'Singapore',
                'flag_code' => 'sg',
                'image_url' => 'https://images.unsplash.com/photo-1525625293386-3f8f99389edd?auto=format&fit=crop&w=800&q=80',
                'description' => 'Marvel at Gardens by the Bay, Sentosa Island, Universal Studios, and clean modern urban paradise.',
                'is_popular' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Maldives',
                'slug' => 'maldives',
                'country' => 'Maldives',
                'flag_code' => 'mv',
                'image_url' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?auto=format&fit=crop&w=800&q=80',
                'description' => 'Unwind in overwater villas, crystal clear turquoise lagoons, coral reefs, and romantic luxury beach resorts.',
                'is_popular' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'India',
                'slug' => 'india',
                'country' => 'India',
                'flag_code' => 'in',
                'image_url' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=800&q=80',
                'description' => 'Explore the majestic Taj Mahal, snow-clad Kashmir valleys, Darjeeling tea gardens, and vibrant heritage.',
                'is_popular' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Saudi Arabia',
                'slug' => 'saudi-arabia',
                'country' => 'Saudi Arabia',
                'flag_code' => 'sa',
                'image_url' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?auto=format&fit=crop&w=800&q=80',
                'description' => 'Spiritual Hajj & Umrah pilgrimage packages to holy Makkah and Madinah with 5-star hotel options.',
                'is_popular' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Europe',
                'slug' => 'europe',
                'country' => 'Multiple Europe',
                'flag_code' => 'eu',
                'image_url' => 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=800&q=80',
                'description' => 'Grand Schengen tour covering Paris Eiffel Tower, Swiss Alps snow peaks, Rome Colosseum, and Amsterdam canals.',
                'is_popular' => false,
                'is_featured' => true,
            ],
        ];

        $createdDestinations = [];
        foreach ($destinations as $d) {
            $createdDestinations[$d['slug']] = Destination::create($d);
        }

        // 3. Tour Categories
        $categories = [
            ['name' => 'Domestic Tours', 'slug' => 'domestic-tours', 'icon_class' => 'bi-geo-alt-fill', 'is_featured' => true, 'image_url' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'International Tours', 'slug' => 'international-tours', 'icon_class' => 'bi-airplane-fill', 'is_featured' => true, 'image_url' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Honeymoon Packages', 'slug' => 'honeymoon-packages', 'icon_class' => 'bi-heart-fill', 'is_featured' => true, 'image_url' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Family Tours', 'slug' => 'family-tours', 'icon_class' => 'bi-people-fill', 'is_featured' => true, 'image_url' => 'https://images.unsplash.com/photo-1506665531195-3566af294817?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Group Tours', 'slug' => 'group-tours', 'icon_class' => 'bi-person-lines-fill', 'is_featured' => true, 'image_url' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Corporate Tours', 'slug' => 'corporate-tours', 'icon_class' => 'bi-briefcase-fill', 'is_featured' => true, 'image_url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Adventure Tours', 'slug' => 'adventure-tours', 'icon_class' => 'bi-compass-fill', 'is_featured' => true, 'image_url' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=600&q=80'],
            ['name' => 'Hajj & Umrah', 'slug' => 'hajj-umrah', 'icon_class' => 'bi-moon-stars-fill', 'is_featured' => true, 'image_url' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?auto=format&fit=crop&w=600&q=80'],
        ];

        $createdCategories = [];
        foreach ($categories as $c) {
            $createdCategories[$c['slug']] = TourCategory::create($c);
        }

        // 4. Tour Packages
        $packagesData = [
            [
                'title' => 'Dubai Miracle & Luxury Desert Experience',
                'slug' => 'dubai-miracle-luxury-desert-experience',
                'destination_id' => $createdDestinations['dubai']->id,
                'category_id' => $createdCategories['international-tours']->id,
                'duration_days' => 5,
                'duration_nights' => 4,
                'starting_price' => 65000,
                'original_price' => 75000,
                'rating' => 4.9,
                'reviews_count' => 28,
                'short_description' => 'Explore Burj Khalifa 124th floor, Desert Safari with BBQ dinner, Miracle Garden & Dubai Mall.',
                'overview' => 'Experience Dubai in total luxury! This 5 Days / 4 Nights comprehensive Dubai package includes return airfare options, 4-star hotel stay in Bur Dubai/Deira, daily breakfast, half-day city tour with English/Bengali speaking guide, Dubai Desert Safari with Dune Bashing, Camel Ride, Tanoura Dance, and BBQ Dinner, plus Dhow Cruise Dinner at Dubai Marina.',
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival & Dhow Cruise Dinner', 'description' => 'Meet & greet at Dubai International Airport. Transfer to 4-star hotel. Evening romantic Dhow Cruise Dinner at Dubai Marina with live entertainment.'],
                    ['day' => 2, 'title' => 'Dubai Half-Day City Tour & Burj Khalifa', 'description' => 'Visit Dubai Frame, Jumeirah Beach, Burj Al Arab photo stop, Dubai Mall, and Observation Deck at Burj Khalifa 124th floor.'],
                    ['day' => 3, 'title' => 'Desert Safari Adventure', 'description' => 'Morning free for shopping at Gold Souk. Afternoon 4x4 Land Cruiser Dune Bashing in Arabian desert, camel riding, quad biking, and sunset BBQ dinner camp.'],
                    ['day' => 4, 'title' => 'Miracle Garden & Global Village', 'description' => 'Visit world largest floral park Miracle Garden and cultural extravaganza at Global Village.'],
                    ['day' => 5, 'title' => 'Shopping & Departure', 'description' => 'Buffet breakfast, check-out, souvenir shopping, and private airport transfer for flight back to Dhaka.'],
                ],
                'inclusions' => ['4-Star Hotel Accommodation with Breakfast', 'Dubai Tourist Visa Fee & Processing', 'Airport Pickup & Drop-off by AC Vehicle', 'Desert Safari with Dune Bashing & Dinner', 'Dubai Marina Dhow Cruise Dinner', 'Burj Khalifa 124th Floor Entry Ticket'],
                'exclusions' => ['International Flight Ticket (Available on request)', 'Tourism Dirham Fee', 'Personal Expenses & Tips', 'Any item not mentioned in inclusions'],
                'hotel_info' => 'Fortune Atrium Hotel / Royal Ascot Hotel (4-Star) with Central AC, Swimming Pool & Free Wi-Fi.',
                'transport_info' => 'Private AC Vehicle for Airport Transfers; Shared Luxury Tourist Coach for Sightseeing.',
                'cover_image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1580674684081-7617fbf3d745?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1546412414-8035e1776c9a?auto=format&fit=crop&w=800&q=80'
                ],
                'terms_conditions' => 'Booking requires 50% advance deposit. Visa approval subject to UAE immigration authorities.',
                'is_featured' => true,
                'is_popular' => true,
                'is_international' => true,
            ],
            [
                'title' => 'Bangkok & Phuket Tropical Island Getaway',
                'slug' => 'bangkok-phuket-tropical-island-getaway',
                'destination_id' => $createdDestinations['thailand']->id,
                'category_id' => $createdCategories['honeymoon-packages']->id,
                'duration_days' => 6,
                'duration_nights' => 5,
                'starting_price' => 58000,
                'original_price' => 68000,
                'rating' => 4.8,
                'reviews_count' => 34,
                'short_description' => 'Phi Phi Island speed boat tour, Coral Island snorkeling, Bangkok Grand Palace & Safari World.',
                'overview' => 'Enjoy 6 Days of paradise in Thailand! Experience 3 Nights in Phuket beach resort and 2 Nights in Bangkok city center. Includes Phi Phi Island speedboat cruise with lunch, Maya Bay sight, Chao Phraya Princess Dinner Cruise in Bangkok, and shopping at Pratunam.',
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival in Phuket', 'description' => 'Flight arrival in Phuket. Private transfer to Patong Beach Resort. Relax on Patong Beach and explore Bangla Road nightlife.'],
                    ['day' => 2, 'title' => 'Phi Phi Island Speedboat Tour', 'description' => 'Full day tour to Maya Bay, Viking Cave, Monkey Beach, and snorkeling at Khai Island with buffet lunch included.'],
                    ['day' => 3, 'title' => 'Phuket City Tour & Flight to Bangkok', 'description' => 'Visit Big Buddha viewpoint, Wat Chalong Temple, Cashew Nut factory. Afternoon flight to Bangkok and hotel check-in.'],
                    ['day' => 4, 'title' => 'Bangkok Temples & Chao Phraya Dinner Cruise', 'description' => 'Visit Golden Buddha Temple & Marble Temple. Evening Chao Phraya River Cruise dinner with live music.'],
                    ['day' => 5, 'title' => 'Safari World & Marine Park', 'description' => 'Full day at Safari World including Dolphin Show, Sea Lion Show, and Safari Park drive.'],
                    ['day' => 6, 'title' => 'Pratunam Shopping & Return Flight', 'description' => 'Shop at Platinum Fashion Mall / MBK Center. Transfer to Suvarnabhumi Airport for Dhaka return flight.'],
                ],
                'inclusions' => ['3 Nights Phuket + 2 Nights Bangkok 4-Star Hotels', 'Thailand Visa Sticker Assistance', 'Daily Breakfast Buffet', 'Phi Phi Island Speedboat Tour with Lunch', 'Phuket & Bangkok Airport Transfers', 'Chao Phraya Dinner Cruise'],
                'exclusions' => ['Air Tickets (Domestic Phuket-Bangkok & International)', 'National Park Entry Fee (400 THB)', 'Personal Expenses'],
                'hotel_info' => 'Phuket: Deevana Plaza Patong / Bangkok: Centara Watergate Pavilion.',
                'transport_info' => 'AC Tourist Bus for Sightseeing & Private Transfers.',
                'cover_image' => 'https://images.unsplash.com/photo-1506665531195-3566af294817?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1506665531195-3566af294817?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?auto=format&fit=crop&w=800&q=80'
                ],
                'terms_conditions' => 'Passport validity minimum 6 months from travel date required for Thailand visa.',
                'is_featured' => true,
                'is_popular' => true,
                'is_international' => true,
            ],
            [
                'title' => 'Cox’s Bazar Beach Luxury Escape',
                'slug' => 'coxs-bazar-beach-luxury-escape',
                'destination_id' => $createdDestinations['bangladesh']->id,
                'category_id' => $createdCategories['domestic-tours']->id,
                'duration_days' => 3,
                'duration_nights' => 2,
                'starting_price' => 14500,
                'original_price' => 18000,
                'rating' => 4.9,
                'reviews_count' => 45,
                'short_description' => 'Stay at 5-Star Ocean Front Resort, Marine Drive drive, Inani Beach, Himchari waterfall & seafood banquet.',
                'overview' => 'Relax on the world’s longest natural sandy beach! 3 Days / 2 Nights luxury stay at Sayeman Beach Resort or Ocean Paradise in Cox’s Bazar. Includes Dhaka-Cox’s Bazar round-trip AC Scania coach or flight option, beachfront breakfast, Marine Drive tour to Inani Beach & Himchari.',
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival & Beach Sunset', 'description' => 'Morning arrival at Cox’s Bazar. Check-in to 5-Star ocean-view room. Afternoon beach walking, sunset view at Laboni Beach, and fresh seafood dinner.'],
                    ['day' => 2, 'title' => 'Marine Drive, Himchari & Inani Beach', 'description' => 'Drive along scenic Marine Drive road. Visit Himchari Hill viewpoint & waterfall, and white coral beaches of Inani Beach. Enjoy ATV beach ride.'],
                    ['day' => 3, 'title' => 'Moheshkhali Island & Departure', 'description' => 'Speedboat ride to Moheshkhali Adinath Temple (optional). Afternoon souvenir shopping at Burmese Market. Evening return journey to Dhaka.'],
                ],
                'inclusions' => ['5-Star Beach Resort Stay with Sea View', 'Daily Buffet Breakfast', 'Dhaka - Cox’s Bazar AC Bus Ticket (Flight upgrade available)', 'Marine Drive & Inani Beach Private Car Tour', 'Welcoming Drinks & Beach Chairs'],
                'exclusions' => ['Lunch & Dinner (Seafood packages available)', 'Beach Water Sports Charges'],
                'hotel_info' => 'Sayeman Beach Resort / Ocean Paradise Hotel & Resort 5-Star.',
                'transport_info' => 'Hyundai / Scania Business Class AC Coach & Private Sedan Car for Marine Drive.',
                'cover_image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80'
                ],
                'terms_conditions' => 'Standard check-in time 12:00 PM. 100% refund on cancellation 7 days prior.',
                'is_featured' => true,
                'is_popular' => true,
                'is_domestic' => true,
            ],
            [
                'title' => 'Sajek Valley Cloud Kingdom & Khagrachari Adventure',
                'slug' => 'sajek-valley-cloud-kingdom-khagrachari',
                'destination_id' => $createdDestinations['bangladesh']->id,
                'category_id' => $createdCategories['adventure-tours']->id,
                'duration_days' => 3,
                'duration_nights' => 2,
                'starting_price' => 9500,
                'original_price' => 12000,
                'rating' => 4.9,
                'reviews_count' => 52,
                'short_description' => 'Experience sunrise above clouds at Konglak Hill, Helipad night view, Alutila Cave & Risang Waterfall.',
                'overview' => 'Step into the clouds at Sajek Valley! 3 Days / 2 Nights adventure tour with Chander Gari jeep ride, stay at premium wooden resort on Ruilui Para, trek to highest point Konglak Hill, barbecue night under starry sky, and Khagrachari Alutila Mysterious Cave exploration.',
                'itinerary' => [
                    ['day' => 1, 'title' => 'Dhaka to Khagrachari & Sajek Ascent', 'description' => 'Overnight AC bus to Khagrachari. Morning breakfast, transfer to open-top Chander Gari (Jeep) with army escort. Ascend to Sajek Valley. Check-in to resort.'],
                    ['day' => 2, 'title' => 'Konglak Hill Summit & BBQ Night', 'description' => 'Early morning cloud watching from resort balcony. Trek to Konglak Para summit. Sunset at Helipad 2. Night Tribal Cultural BBQ dinner around bonfire.'],
                    ['day' => 3, 'title' => 'Khagrachari Alutila Cave & Hanging Bridge', 'description' => 'Descend to Khagrachari. Explore Alutila Mysterious Cave with torch light, Risang Waterfall, and Khagrachari Hanging Bridge. Night bus return to Dhaka.'],
                ],
                'inclusions' => ['2 Nights Eco Wooden Resort Stay at Sajek Valley', 'Reserved Open Chander Gari (Jeep) for full 3 days', 'All Meals (3 Breakfasts, 3 Lunches, 2 Dinners including Special Tribal BBQ)', 'Alutila Cave & Waterfall Entry Tickets', 'Experienced Local Tour Guide'],
                'exclusions' => ['Personal Shopping & Snacks', 'Camera / Drone permits if applicable'],
                'hotel_info' => 'Sajek Megh Machang / Sajek Valley Resort / Meghpolli Resort.',
                'transport_info' => 'Dhaka-Khagrachari AC Bus + Reserved 4x4 Chander Gari.',
                'cover_image' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80'
                ],
                'terms_conditions' => 'Original NID / Passport / Student ID mandatory for army checkpoint entry at Dighinala.',
                'is_featured' => true,
                'is_popular' => true,
                'is_domestic' => true,
            ],
            [
                'title' => 'Kashmir Paradise on Earth Snow & Tulip Tour',
                'slug' => 'kashmir-paradise-on-earth-snow-tulip-tour',
                'destination_id' => $createdDestinations['india']->id,
                'category_id' => $createdCategories['international-tours']->id,
                'duration_days' => 6,
                'duration_nights' => 5,
                'starting_price' => 48000,
                'original_price' => 56000,
                'rating' => 4.95,
                'reviews_count' => 41,
                'short_description' => 'Srinagar Dal Lake Houseboat stay, Shikara Ride, Gulmarg Gondola Cable Car, Pahalgam & Sonamarg.',
                'overview' => 'Discover why Kashmir is called Heaven on Earth! Stay in luxury Wooden Houseboat on Dal Lake Srinagar, ride iconic Shikara boat, enjoy world second highest Gondola Cable Car in Gulmarg, visit Betaab Valley in Pahalgam, and Sonamarg glacier.',
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival Srinagar & Shikara Ride', 'description' => 'Flight arrival at Srinagar Airport. Transfer to traditional Deluxe Houseboat on Dal Lake. 1-hour sunset Shikara ride.'],
                    ['day' => 2, 'title' => 'Srinagar Mughal Gardens Tour', 'description' => 'Visit Nishat Bagh, Shalimar Bagh, Chashme Shahi, and famous Shankaracharya Temple overlooking Srinagar city.'],
                    ['day' => 3, 'title' => 'Gulmarg Snow Meadows & Gondola', 'description' => 'Full day excursion to Gulmarg. Ride Phase 1 & Phase 2 Cable Car to 14,000 ft snow mountain top.'],
                    ['day' => 4, 'title' => 'Pahalgam Valley of Shepherds', 'description' => 'Drive through Saffron fields to Pahalgam. Visit Aru Valley, Betaab Valley, and Chandanwari by local taxi.'],
                    ['day' => 5, 'title' => 'Sonamarg Meadow of Gold', 'description' => 'Excursion to Sonamarg glacier region. Pony ride to Thajiwas Glacier.'],
                    ['day' => 6, 'title' => 'Departure from Srinagar', 'description' => 'Breakfast in Houseboat, Kashmiri Saffron & Shawl shopping, transfer to Srinagar Airport for flight back.'],
                ],
                'inclusions' => ['1 Night Luxury Houseboat Stay + 4 Nights Hotel Stay', 'Daily Breakfast & Dinner (MAP Plan)', '1 Hour Shikara Ride on Dal Lake Srinagar', 'Airport Pickup & All Transfers by Private Vehicle', 'Indian Tourist Visa E-Visa Assistance'],
                'exclusions' => ['Air Tickets Dhaka-Kolkata-Srinagar', 'Gulmarg Gondola Tickets', 'Pahalgam Local Taxi Union Charge'],
                'hotel_info' => 'Houseboat: Royal Group of Houseboats / Hotel: Hotel Grand Mumtaz Srinagar.',
                'transport_info' => 'Private AC Innova / Sedan for entire Kashmir tour.',
                'cover_image' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=800&q=80'
                ],
                'terms_conditions' => 'E-Visa processing takes 3-4 working days.',
                'is_featured' => true,
                'is_popular' => true,
                'is_international' => true,
            ],
            [
                'title' => 'Premium 14-Day Umrah Package from Dhaka',
                'slug' => 'premium-14-day-umrah-package-from-dhaka',
                'destination_id' => $createdDestinations['saudi-arabia']->id,
                'category_id' => $createdCategories['hajj-umrah']->id,
                'duration_days' => 14,
                'duration_nights' => 13,
                'starting_price' => 145000,
                'original_price' => 165000,
                'rating' => 5.0,
                'reviews_count' => 60,
                'short_description' => '7 Nights Makkah 5-Star Hotel (Clock Tower) + 6 Nights Madinah Hotel near Masjid an-Nabawi.',
                'overview' => 'Perform your sacred Umrah pilgrimage with maximum peace of mind. Complete 14-Day Umrah package including Saudi Umrah Visa, Biman Bangladesh / Saudia direct round-trip air ticket, 5-Star hotel stay within 200m of Haram Shareef in Makkah, 4-Star stay near Prophet’s Mosque in Madinah, full AC bus transport, Ziaraat historical site tours, and experienced Moallem support.',
                'itinerary' => [
                    ['day' => 1, 'title' => 'Dhaka to Jeddah & Makkah Arrival', 'description' => 'Direct flight from Dhaka to Jeddah with Ihram. Private bus transfer to Makkah 5-star hotel. Perform first Umrah with guide.'],
                    ['day' => 2, 'title' => 'Ibadah at Masjid al-Haram', 'description' => 'Full day dedicated to prayers, Tawaaf, and Ibadah in Masjid al-Haram.'],
                    ['day' => 3, 'title' => 'Makkah Ziaraat (Holy Places Tour)', 'description' => 'Guided tour to Jabal al-Nour (Cave Hira), Jabal Thawr, Mina, Muzdalifah, Arafat, and Jannat al-Mu\'alla.'],
                    ['day' => 4, 'title' => 'Second Umrah from Masjid Aisha', 'description' => 'Visit Ji\'rana / Masjid Aisha for Niyyah and perform second optional Umrah.'],
                    ['day' => 5, 'title' => 'Ibadah & Tawaaf', 'description' => 'Day for personal prayers, Quran recitation, and Nafl Tawaaf.'],
                    ['day' => 6, 'title' => 'Ibadah & Preparation for Madinah', 'description' => 'Rest, shopping, and preparing luggage for transfer to the City of Light.'],
                    ['day' => 7, 'title' => 'Transfer to Madinah Al Munawwarah', 'description' => 'Farewell Tawaaf. High-speed Haramain Train or luxury AC Bus transfer to Madinah. Check-in to hotel near Haram.'],
                    ['day' => 8, 'title' => 'Salam at Rawdah Shareef', 'description' => 'Visit Masjid an-Nabawi and present Salam to Prophet Muhammad (PBUH). Visit Rawdah Shareef with Nusuk app permit.'],
                    ['day' => 9, 'title' => 'Madinah Ziaraat', 'description' => 'Visit Mount Uhud, Masjid al-Quba (first mosque of Islam), Masjid al-Qiblatayn, and Seven Mosques.'],
                    ['day' => 10, 'title' => 'Date Garden Visit & Ibadah', 'description' => 'Visit Madinah Date Market & Organic Date Farm. Prayers at Prophet Mosque.'],
                    ['day' => 11, 'title' => 'Ibadah in Madinah', 'description' => 'Full day Ibadah and Quran recitation.'],
                    ['day' => 12, 'title' => 'Ibadah & Shopping', 'description' => 'Shop for Ajwa dates, Zamzam water, and Islamic items.'],
                    ['day' => 13, 'title' => 'Final Salam & Packing', 'description' => 'Final salam at Rawdah Shareef. Rest and bag packing.'],
                    ['day' => 14, 'title' => 'Madinah Airport Departure to Dhaka', 'description' => 'Transfer to Prince Mohammad bin Abdulaziz Airport Madinah. Return flight to Dhaka.'],
                ],
                'inclusions' => ['Saudi Umrah Tourist E-Visa with Medical Insurance', 'Direct Flight Round-Trip Ticket (Biman / Saudia)', '7 Nights Makkah 5-Star Hotel (Swissotel / Pullmann Zamzam)', '6 Nights Madinah Hotel (Frontel Al Harithia / Pullman)', 'Full AC Bus Transfers (Jeddah - Makkah - Madinah - Airport)', 'Makkah & Madinah Guided Ziaraat Tours', '5 Liters Zamzam Water Container per Haji', 'Complimentary Umrah Kit (Bag, Tawaf Counter, Book)'],
                'exclusions' => ['Food / Meals (Buffet upgrade available)', 'Personal expenses'],
                'hotel_info' => 'Makkah: Swissôtel Makkah Clock Tower (5-Star) / Madinah: Frontel Al Harithia Hotel (4-Star).',
                'transport_info' => '2025 Model Mercedes Travego AC Tourist Bus.',
                'cover_image' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1591604466107-ec97de577aff?auto=format&fit=crop&w=800&q=80'
                ],
                'terms_conditions' => 'Passport scan copy with 6+ month validity required. Booking deposit BDT 50,000.',
                'is_featured' => true,
                'is_popular' => true,
                'is_hajj_umrah' => true,
            ],
            [
                'title' => 'Maldives Overwater Bungalow Romance Tour',
                'slug' => 'maldives-overwater-bungalow-romance-tour',
                'destination_id' => $createdDestinations['maldives']->id,
                'category_id' => $createdCategories['honeymoon-packages']->id,
                'duration_days' => 4,
                'duration_nights' => 3,
                'starting_price' => 98000,
                'original_price' => 115000,
                'rating' => 4.95,
                'reviews_count' => 19,
                'short_description' => 'Stay in Luxury Ocean Water Villa, Speedboat transfer, All-inclusive meals, Snorkeling & Sunset Dolphin Cruise.',
                'overview' => 'Indulge in pure island romance! 4 Days / 3 Nights stay at 5-Star Maldives Island Resort with 2 Nights in Beach Villa and 1 Night in Iconic Overwater Bungalow with direct ocean access. Includes speedboat transfers, all meals & beverages, sunset dolphin cruise, and couple photoshoot.',
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival Male Airport & Speedboat Transfer', 'description' => 'Arrival at Velana International Airport Male. Speedboat transfer to resort island. Check-in to Beach Front Villa.'],
                    ['day' => 2, 'title' => 'Snorkeling & Sunset Dolphin Cruise', 'description' => 'Morning coral reef snorkeling excursion. Evening romantic sunset dolphin watching cruise.'],
                    ['day' => 3, 'title' => 'Overwater Villa Upgrade & Candlelight Dinner', 'description' => 'Transfer to private Water Villa with private deck & ocean pool. Romantic beach candlelight seafood dinner.'],
                    ['day' => 4, 'title' => 'Floating Breakfast & Departure', 'description' => 'Floating breakfast in pool. Check-out, speedboat transfer back to Male Airport for flight home.'],
                ],
                'inclusions' => ['2 Nights Beach Villa + 1 Night Water Villa 5-Star Resort', 'Round-trip Speedboat Transfers Male Airport-Resort-Airport', 'Full Board Meal Plan (Breakfast, Lunch & Dinner)', 'Sunset Dolphin Watching Cruise', 'Free Snorkeling Gear Rental', 'Maldives On-Arrival Free Tourist Visa'],
                'exclusions' => ['International Flight Dhaka-Male-Dhaka', 'Spa Treatments & Scuba Diving'],
                'hotel_info' => 'Sun Siyam Olhuveli / Centara Ras Fushi Resort & Spa Maldives 5-Star.',
                'transport_info' => 'Resort Speedboat Boat Transfer.',
                'cover_image' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?auto=format&fit=crop&w=800&q=80'
                ],
                'terms_conditions' => 'Visa free on arrival for Bangladeshi passport holders with hotel confirmation.',
                'is_featured' => true,
                'is_popular' => true,
                'is_international' => true,
            ],
            [
                'title' => 'Kuala Lumpur & Genting Highlands Explorer',
                'slug' => 'kuala-lumpur-genting-highlands-explorer',
                'destination_id' => $createdDestinations['malaysia']->id,
                'category_id' => $createdCategories['family-tours']->id,
                'duration_days' => 4,
                'duration_nights' => 3,
                'starting_price' => 42000,
                'original_price' => 49000,
                'rating' => 4.7,
                'reviews_count' => 22,
                'short_description' => 'Petronas Twin Towers photo stop, Batu Caves, Genting Skyway Cable Car & Skytropolis Theme Park.',
                'overview' => 'Discover modern metropolis and mountain coolness! 4 Days / 3 Nights tour in Kuala Lumpur. Visit iconic Petronas Twin Towers, Batu Caves Rainbow Stairs, take Genting Skyway Cable Car ride up to Genting Highlands mountain resort and indoor theme park.',
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival Kuala Lumpur & City Tour', 'description' => 'Flight arrival at KLIA Airport. Private transfer to Bukit Bintang hotel. Visit Petronas Twin Towers, KL Tower, Independence Square.'],
                    ['day' => 2, 'title' => 'Batu Caves & Genting Highlands', 'description' => 'Visit famous Batu Caves Hindu Temple. Ride Awana Skyway Cable Car to Genting Highlands. Explore SkyAvenue mall & theme parks.'],
                    ['day' => 3, 'title' => 'Putrajaya Administrative City Tour', 'description' => 'Visit Putrajaya Pink Mosque, Putra Bridge, and Prime Minister Office complex.'],
                    ['day' => 4, 'title' => 'Shopping at Sungei Wang & Departure', 'description' => 'Shop at Bukit Bintang malls. Transfer to KLIA for return flight to Dhaka.'],
                ],
                'inclusions' => ['3 Nights 4-Star Hotel in Bukit Bintang KL', 'Malaysia E-Visa Processing & Fee', 'Daily Breakfast Buffet', 'Genting Cable Car Return Tickets', 'Airport Pick & Drop by Private Coach'],
                'exclusions' => ['Air Tickets', 'Tourism Tax (RM 10 per room per night)'],
                'hotel_info' => 'Dorsett Kuala Lumpur / Verdant Hill Hotel Bukit Bintang.',
                'transport_info' => 'AC Tourist Vehicle.',
                'cover_image' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?auto=format&fit=crop&w=1200&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?auto=format&fit=crop&w=800&q=80'
                ],
                'terms_conditions' => 'Malaysia eVISA single entry approved within 48 hours.',
                'is_featured' => true,
                'is_popular' => false,
                'is_international' => true,
            ]
        ];

        foreach ($packagesData as $pkg) {
            TourPackage::create($pkg);
        }

        // 5. Visa Services
        $visas = [
            [
                'country' => 'India',
                'slug' => 'india-visa',
                'flag_icon' => 'in',
                'visa_type' => 'Tourist Visa',
                'price' => 1500,
                'processing_time' => '5 - 7 Working Days',
                'validity' => '1 Year Multiple Entry',
                'required_documents' => ['Original Passport (valid 6+ months)', '2 Copies 2x2 inch White background photos', 'Utility Bill copy (Electricity/Gas)', 'Bank Statement last 6 months', 'NID card photocopy', 'Profession proof (NOC / Trade License)'],
                'details' => 'Full E-token booking, application form filling, document check and IVAC submission support for Indian Tourist & Medical Visa.',
                'is_popular' => true,
            ],
            [
                'country' => 'United Arab Emirates (Dubai)',
                'slug' => 'dubai-visa',
                'flag_icon' => 'ae',
                'visa_type' => 'Tourist Visa (30 Days)',
                'price' => 14500,
                'processing_time' => '48 - 72 Hours',
                'validity' => '60 Days from issue',
                'required_documents' => ['Passport first page color scan copy', 'White background passport photo scan', 'NID scan copy'],
                'details' => '100% online Dubai tourist e-visa. Express approval in 24-48 hours with travel insurance included.',
                'is_popular' => true,
            ],
            [
                'country' => 'Thailand',
                'slug' => 'thailand-visa',
                'flag_icon' => 'th',
                'visa_type' => 'Tourist Visa (Sticker)',
                'price' => 5500,
                'processing_time' => '4 - 5 Working Days',
                'validity' => '3 Months Single Entry',
                'required_documents' => ['Original Passport', 'Bank Statement (Minimum BDT 60,000 balance per person)', 'Bank Solvency Certificate', '2 Photos (3.5x4.5cm MATT paper)', 'Visiting card / Student ID', 'NOC / Trade License translated'],
                'details' => 'Thailand Embassy sticker visa submission through authorized agent at Royal Thai Embassy Dhaka.',
                'is_popular' => true,
            ],
            [
                'country' => 'Malaysia',
                'slug' => 'malaysia-visa',
                'flag_icon' => 'my',
                'visa_type' => 'eVISA Single Entry',
                'price' => 4500,
                'processing_time' => '2 - 3 Working Days',
                'validity' => '3 Months',
                'required_documents' => ['Passport Scan copy', 'Photo 35mm x 50mm white background', 'Flight itinerary & Hotel booking confirmation', 'Bank Statement (last 3 months)'],
                'details' => 'Official Malaysia eVISA approval PDF delivered to your email address.',
                'is_popular' => true,
            ],
            [
                'country' => 'Singapore',
                'slug' => 'singapore-visa',
                'flag_icon' => 'sg',
                'visa_type' => 'E-Visa (Authorized Agent)',
                'price' => 4800,
                'processing_time' => '3 - 5 Working Days',
                'validity' => '90 Days Multiple Entry',
                'required_documents' => ['Original Passport', '2 Passport size photos (35x45mm white background)', 'Bank Statement (BDT 1,00,000+ balance)', 'Employment Letter / Trade License'],
                'details' => 'Singapore ICA e-Visa issued by Singapore embassy authorized agency in Bangladesh.',
                'is_popular' => true,
            ],
            [
                'country' => 'Saudi Arabia',
                'slug' => 'saudi-arabia-visa',
                'flag_icon' => 'sa',
                'visa_type' => 'Umrah Tourist E-Visa',
                'price' => 28000,
                'processing_time' => '24 - 48 Hours',
                'validity' => '90 Days Multiple Entry',
                'required_documents' => ['Passport Scan', 'Passport photo scan', 'Contact number & Email'],
                'details' => 'Valid for performing Umrah in Makkah & Madinah and traveling across Saudi Arabia.',
                'is_popular' => true,
            ],
        ];

        foreach ($visas as $v) {
            VisaService::create($v);
        }

        // 6. Hotels
        $hotels = [
            [
                'name' => 'Sayeman Beach Resort',
                'slug' => 'sayeman-beach-resort',
                'location' => 'Kolatoli Beach, Cox\'s Bazar',
                'destination_id' => $createdDestinations['bangladesh']->id,
                'rating' => 4.9,
                'price_per_night' => 8500,
                'cover_image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80',
                'address' => 'Marine Drive, Kolatoli, Cox\'s Bazar',
                'amenities' => ['Sea View Rooms', 'Infinity Swimming Pool', 'Free Breakfast Buffet', 'Private Beach Lounge', 'Free High-speed Wi-Fi', 'Gym & Spa'],
                'description' => 'Cox’s Bazar premier 5-star oceanfront resort offering majestic views of the Bay of Bengal.',
                'is_featured' => true,
            ],
            [
                'name' => 'Fortune Atrium Hotel Dubai',
                'slug' => 'fortune-atrium-hotel-dubai',
                'location' => 'Bur Dubai, UAE',
                'destination_id' => $createdDestinations['dubai']->id,
                'rating' => 4.6,
                'price_per_night' => 14000,
                'cover_image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=800&q=80',
                'address' => 'Khalid Bin Al Waleed Road, Bur Dubai',
                'amenities' => ['Rooftop Pool', 'Multi-cuisine Restaurant', 'Fitness Center', 'Airport Shuttle', 'Free Wi-Fi'],
                'description' => 'Modern 4-star hotel close to ADCB Metro Station, Gold Souk, and Dubai Mall.',
                'is_featured' => true,
            ],
            [
                'name' => 'Deevana Plaza Patong Resort',
                'slug' => 'deevana-plaza-patong-resort',
                'location' => 'Patong Beach, Phuket, Thailand',
                'destination_id' => $createdDestinations['thailand']->id,
                'rating' => 4.7,
                'price_per_night' => 7200,
                'cover_image' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=800&q=80',
                'address' => '209 25 Raj-U-Thid 200 Pee Rd, Patong, Phuket',
                'amenities' => ['Lagoon Swimming Pool', 'Orientala Spa', 'Kid Club', 'Pool Bar', '5 mins walk to beach'],
                'description' => 'Tranquil luxury resort in the heart of bustling Patong Beach, Phuket.',
                'is_featured' => true,
            ],
            [
                'name' => 'Swissôtel Makkah Clock Tower',
                'slug' => 'swissotel-makkah-clock-tower',
                'location' => 'King Abdul Aziz Endowment, Makkah',
                'destination_id' => $createdDestinations['saudi-arabia']->id,
                'rating' => 4.95,
                'price_per_night' => 28000,
                'cover_image' => 'https://images.unsplash.com/photo-1591604466107-ec97de577aff?auto=format&fit=crop&w=800&q=80',
                'address' => 'Abraj Al Bait Complex, Makkah, Saudi Arabia',
                'amenities' => ['Direct Haram View', 'Direct Access to Masjid al-Haram', '5-Star Fine Dining', '24-Hour Room Service'],
                'description' => 'Prestige 5-star hotel attached to Abraj Al Bait Abraj towers directly facing Holy Kaaba.',
                'is_featured' => true,
            ],
        ];

        foreach ($hotels as $h) {
            Hotel::create($h);
        }

        // 7. Blog Posts
        $blogs = [
            [
                'title' => 'Dubai ভ্রমণের সম্পূর্ণ গাইড: ভিসা, বাজেট ও দেখার মতো জায়গা',
                'slug' => 'dubai-travel-complete-guide-bangla',
                'category' => 'Travel Guide',
                'cover_image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'বাংলাদেশ থেকে দুবাই ভ্রমণের জন্য ভিসা প্রসেসিং, কম খরচে এয়ার টিকিট, সেরা দর্শনীয় স্থান ও শপিং টিপস।',
                'content' => 'দুবাই মধ্যপ্রাচ্যের অন্যতম আকর্ষণীয় আধুনিক শহর। বাংলাদেশিদের জন্য দুবাই ভ্রমণ এখন বেশ সহজ। ই-ভিসা আবেদনের মাধ্যমে মাত্র ২-৩ দিনে দুবাই ট্যুরিস্ট ভিসা পাওয়া যায়। কম বাজেটে দুবাই ঘোরার সেরা সময় হলো নভেম্বর থেকে মার্চ মাস। বুর্জ খলিফা, দুবাই ফ্রেম, ডেজার্ট সাফারি ও গ্লোবাল ভিলেজ মিস করবেন না।',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'India Visa Application Guide for Bangladeshi Passport Holders',
                'slug' => 'india-visa-application-guide-bangladesh',
                'category' => 'Visa Info',
                'cover_image' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'Step-by-step documentation checklist and IVAC e-token submission process for Indian Tourist Visa.',
                'content' => 'Applying for an Indian visa from Bangladesh requires accurate documents. Make sure your bank statement has at least BDT 20,000 balance and electricity bill address matches your present address. Attach proper NOC from employer or trade license for businessmen.',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Thailand Tour Cost from Bangladesh: 2026 Updated Price Breakdown',
                'slug' => 'thailand-tour-cost-from-bangladesh-2026',
                'category' => 'Budget Travel',
                'cover_image' => 'https://images.unsplash.com/photo-1506665531195-3566af294817?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'How much money do you need for a 5 Days Thailand vacation? Airfare, hotel, meals & island tours.',
                'content' => 'A typical 5-day Bangkok and Phuket tour costs between BDT 55,000 to BDT 70,000 per person including flights, 4-star hotels, daily breakfasts, and Phi Phi island speedboat tour.',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Sajek Valley Cloud Season: Best Time & Resort Booking Tips',
                'slug' => 'sajek-valley-cloud-season-tips',
                'category' => 'Domestic Travel',
                'cover_image' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80',
                'excerpt' => 'সাজেক ভ্যালিতে মেঘের খেলা দেখতে বছরের কোন সময়ে যাবেন এবং কীভাবে সেরা কটেজ বুক করবেন?',
                'content' => 'বর্ষার শেষভাগ ও শীতের শুরুতে (সেপ্টেম্বর - নভেম্বর) সাজেকে মেঘের ঘনত্ব সবচেয়ে বেশি থাকে। রুইলুই পাড়ার সেরা কটেজগুলো আগে থেকেই রিভার্স করা বুদ্ধিমানের কাজ।',
                'published_at' => now()->subDays(12),
            ],
        ];

        foreach ($blogs as $b) {
            BlogPost::create($b);
        }

        // 8. Reviews
        $reviews = [
            [
                'customer_name' => 'Dr. Rafiqul Islam',
                'customer_photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80',
                'destination' => 'Dubai 5 Days Package',
                'rating' => 5,
                'review_text' => 'GoTravel organized our Dubai trip impeccably! The hotel was right in the city center, desert safari dune bashing was thrilling, and visa was approved within 48 hours. Highly recommended agency in Bangladesh!',
            ],
            [
                'customer_name' => 'Nusrat Jahan & Family',
                'customer_photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=200&q=80',
                'destination' => 'Umrah Premium Package',
                'rating' => 5,
                'review_text' => 'আমাদের পুরো পরিবারের উমরাহ সফরের প্রতিটা দিন অত্যন্ত সুশৃঙ্খল ছিল। মক্কার হোটেল হারাম শরীফ থেকে মাত্র ২ মিনিট দূরে ছিল। মোয়াল্লেম সাহেবের দিকনির্দেশনা চমৎকার ছিল। জাজাকাল্লাহু খায়ের।',
            ],
            [
                'customer_name' => 'Mahbub Hassan',
                'customer_photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80',
                'destination' => 'Sajek Valley Tour',
                'rating' => 5,
                'review_text' => 'সাজেক ভ্যালির মেঘ মাচাং কটেজের ভিউ অসম্ভব সুন্দর ছিল! চাঁদের গাড়ির ড্রাইভার খুবই অভিজ্ঞ ছিলেন। পরিবার নিয়ে দারুণ সময় কেটেছে।',
            ],
            [
                'customer_name' => 'Sabrina Sultana',
                'customer_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
                'destination' => 'Kashmir Honeymoon Tour',
                'rating' => 5,
                'review_text' => 'The Dal Lake houseboat experience and Gulmarg Gondola ride were breathtaking! Thank you GoTravel for customizing our romantic honeymoon package so beautifully.',
            ],
        ];

        foreach ($reviews as $r) {
            Review::create($r);
        }

        // 9. FAQs
        $faqs = [
            [
                'question' => 'Tour package-এর মধ্যে কী কী সুবিধা অন্তর্ভুক্ত থাকে?',
                'answer' => 'আমাদের প্রতিটি প্যাকেজের বিস্তারিত বিবরণীতে অন্তর্ভুক্ত বিষয়সমূহ পরিষ্কারভাবে উল্লেখ থাকে। সাধারণত ৩/৪-তারকা হোটেল আবাসন, প্রাতরাশ (Breakfast), বিমানবন্দর পিকআপ ও ড্রপ, দর্শনীয় স্থান পরিদর্শন (Sightseeing tour) এবং প্রয়োজনীয় ভিসা প্রসেসিং অন্তর্ভুক্ত থাকে।',
                'category' => 'General',
                'order_index' => 1,
            ],
            [
                'question' => 'Booking কীভাবে সম্পাদন করব?',
                'answer' => 'আপনি ওয়েবসাইট থেকে সরাসরি পছন্দের প্যাকেজে "Book Now" বাটনে ক্লিক করে ফর্ম পূরণ করতে পারেন অথবা আমাদের হটলাইন নম্বর +8801712345678 / WhatsApp এ সরাসরি মেসেজ পাঠাতে পারেন। আমাদের প্রতিনিধি আপনার সাথে সাথে যোগাযোগ করবেন।',
                'category' => 'Booking',
                'order_index' => 2,
            ],
            [
                'question' => 'Visa processing এর জন্য কতদিন সময় লাগে?',
                'answer' => 'দেশভেদে ভিসা প্রসেসিংয়ের সময় ভিন্ন হয়ে থাকে। যেমন: দুবাই ই-ভিসা ২৪-৭২ ঘণ্টা, মালয়েশিয়া ই-ভিসা ২-৩ কার্যদিবস, থাইল্যান্ড ভিসা ৪-৫ কার্যদিবস এবং ভারত ভিসা ৫-৭ কার্যদিবস সময় লাগে।',
                'category' => 'Visa',
                'order_index' => 3,
            ],
            [
                'question' => 'Payment কীভাবে করব?',
                'answer' => 'আমরা বিকাশ (bKash), নগদ (Nagad), অনলাইন ব্যাংক ট্রান্সফার, ডেবিট/ক্রেডিট কার্ড এবং আমাদের গুলশান অফিসে সরাসরি ক্যাশ পেমেন্ট গ্রহণ করি। বুকিং কনফার্মেশনের সাথে সাথে আপনি অফিসিয়াল মানি রিসিট ও চালান পাবেন।',
                'category' => 'Payment',
                'order_index' => 4,
            ],
            [
                'question' => 'Package পছন্দ অনুযায়ী Customize করা যাবে কি?',
                'answer' => 'জি, অবশ্যই! আপনার ভ্রমণসঙ্গীর সংখ্যা, বাজেট, পছন্দের হোটেল ক্যাটাগরি এবং ভ্রমণের তারিখ অনুযায়ী আমরা সম্পূর্ণ কাস্টমাইজড ট্রাভেল প্যাক বানিয়ে দিতে পারি। "Custom Tour Request" পেজ থেকে রিকোয়েস্ট পাঠান।',
                'category' => 'Custom Tour',
                'order_index' => 5,
            ],
            [
                'question' => 'Tour Cancellation Policy বা বাতিলের নীতি কী?',
                'answer' => 'ভ্রমণের তারিখের অন্তত ৭ দিন আগে বাতিল করলে এয়ারলাইন ও হোটেল শর্তসাপেক্ষে ৯০% পর্যন্ত অর্থ ফেরত পাওয়া যায়। বিস্তারিত বাতিলের নীতিমালা প্রতিটি প্যাকেজের শর্তাবলীতে উল্লেখ থাকে।',
                'category' => 'Cancellation',
                'order_index' => 6,
            ],
        ];

        foreach ($faqs as $f) {
            Faq::create($f);
        }

        // 10. Gallery Items
        $gallery = [
            ['title' => 'Burj Khalifa Dubai Marina Sunset', 'category' => 'Destinations', 'image_url' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Phi Phi Island Thailand Snorkeling', 'category' => 'Customer Tours', 'image_url' => 'https://images.unsplash.com/photo-1506665531195-3566af294817?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Cox\'s Bazar Marine Drive Scenery', 'category' => 'Destinations', 'image_url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Sajek Valley Cloud Sunrise', 'category' => 'Group Tours', 'image_url' => 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Kashmir Dal Lake Houseboat Group', 'category' => 'Group Tours', 'image_url' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=800&q=80'],
            ['title' => 'Maldives Luxury Overwater Villa', 'category' => 'Hotels', 'image_url' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?auto=format&fit=crop&w=800&q=80'],
        ];

        foreach ($gallery as $g) {
            GalleryItem::create($g);
        }

        // 11. Sample Bookings
        $dubaiPkg = TourPackage::where('slug', 'dubai-miracle-luxury-desert-experience')->first();
        if ($dubaiPkg) {
            Booking::create([
                'booking_number' => 'GT-2026-8901',
                'user_id' => $customer->id,
                'tour_package_id' => $dubaiPkg->id,
                'travel_date' => now()->addDays(20),
                'adults_count' => 2,
                'children_count' => 0,
                'total_price' => 130000,
                'paid_amount' => 130000,
                'payment_status' => 'Paid',
                'booking_status' => 'Confirmed',
                'customer_name' => 'Tanvir Ahmed',
                'customer_email' => 'user@gotravel.com',
                'customer_phone' => '+8801812345678',
                'passport_number' => 'B01234567',
                'special_requests' => 'King size bed preferred. Honeymoon arrangement.',
                'payment_method' => 'bKash',
                'transaction_id' => 'BK890123456',
            ]);

            Booking::create([
                'booking_number' => 'GT-2026-8902',
                'user_id' => $customer->id,
                'tour_package_id' => TourPackage::where('slug', 'coxs-bazar-beach-luxury-escape')->first()->id ?? $dubaiPkg->id,
                'travel_date' => now()->addDays(45),
                'adults_count' => 2,
                'children_count' => 1,
                'total_price' => 29000,
                'paid_amount' => 10000,
                'payment_status' => 'Partial',
                'booking_status' => 'Pending',
                'customer_name' => 'Tanvir Ahmed',
                'customer_email' => 'user@gotravel.com',
                'customer_phone' => '+8801812345678',
                'passport_number' => 'B01234567',
                'special_requests' => 'Sea facing balcony room on upper floor.',
                'payment_method' => 'Nagad',
                'transaction_id' => 'NG77889900',
            ]);
        }

        // 12. Coupons
        Coupon::create([
            'code' => 'EID2026',
            'discount_type' => 'percent',
            'discount_value' => 10.00,
            'expires_at' => now()->addMonths(3),
            'status' => true,
        ]);

        Coupon::create([
            'code' => 'GOTRAVEL5000',
            'discount_type' => 'fixed',
            'discount_value' => 5000.00,
            'expires_at' => now()->addMonths(6),
            'status' => true,
        ]);
    }
}
