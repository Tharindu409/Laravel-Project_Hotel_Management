<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HotelManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_total_price_is_calculated_from_nights_and_room_price(): void
    {
        $room = Room::create([
            'hotel_name' => 'Benthota Resort',
            'title' => 'Deluxe Suite',
            'slug' => 'deluxe-suite',
            'description' => 'Comfortable suite',
            'price_per_night' => 150,
            'capacity_adults' => 2,
            'capacity_children' => 1,
            'room_type' => 'Deluxe',
            'is_featured' => true,
            'is_available' => true,
        ]);

        $customer = Customer::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '0771234567',
            'address' => 'Colombo',
        ]);

        $response = $this->post('/bookings', [
            'customer_id' => $customer->id,
            'room_id' => $room->id,
            'check_in_date' => '2026-08-10',
            'check_out_date' => '2026-08-14',
            'guests_count' => 2,
            'status' => 'pending',
        ]);

        $response->assertRedirect('/bookings');

        $booking = Booking::latest()->first();
        $this->assertNotNull($booking);
        $this->assertSame(600.0, (float) $booking->total_price);
    }

    public function test_home_page_renders_for_logged_in_user(): void
    {
        $user = User::factory()->create(['usertype' => 'user']);

        $response = $this->actingAs($user)->get('/home');

        $response->assertOk();
    }

    public function test_customer_can_create_public_reservation(): void
    {
        $room = Room::create([
            'hotel_name' => 'Benthota Resort',
            'title' => 'Ocean View',
            'slug' => 'ocean-view',
            'description' => 'Lovely room',
            'price_per_night' => 125,
            'capacity_adults' => 2,
            'capacity_children' => 0,
            'room_type' => 'Deluxe',
            'is_featured' => true,
            'is_available' => true,
        ]);

        $response = $this->post('/reserve', [
            'room_id' => $room->id,
            'name' => 'Alice Guest',
            'email' => 'alice@example.com',
            'phone' => '0771111111',
            'check_in_date' => '2026-09-01',
            'check_out_date' => '2026-09-03',
            'guests_count' => 2,
            'notes' => 'Late arrival',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('bookings', [
            'room_id' => $room->id,
            'status' => 'pending',
        ]);
    }

    public function test_payment_can_be_created_for_booking(): void
    {
        $room = Room::create([
            'hotel_name' => 'Benthota Resort',
            'title' => 'Standard Room',
            'slug' => 'standard-room',
            'description' => 'Standard room',
            'price_per_night' => 100,
            'capacity_adults' => 2,
            'capacity_children' => 0,
            'room_type' => 'Single',
            'is_featured' => false,
            'is_available' => true,
        ]);

        $customer = Customer::create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'phone' => '0712345678',
            'address' => 'Galle',
        ]);

        $booking = Booking::create([
            'customer_id' => $customer->id,
            'room_id' => $room->id,
            'check_in_date' => '2026-08-10',
            'check_out_date' => '2026-08-12',
            'guests_count' => 2,
            'status' => 'confirmed',
            'total_price' => 200,
        ]);

        $response = $this->post('/payments', [
            'booking_id' => $booking->id,
            'amount' => 200,
            'payment_method' => 'Card',
            'status' => 'Paid',
        ]);

        $response->assertRedirect('/payments');
        $this->assertDatabaseHas('payments', [
            'booking_id' => $booking->id,
            'payment_method' => 'Card',
            'status' => 'Paid',
        ]);
    }
}
