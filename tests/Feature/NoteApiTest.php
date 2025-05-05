<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Note;

class NoteApiTest extends TestCase
{

   #[Test]
   public function it_can_list_notes()
   {
        $response = $this->get('api/notes');

        $response->assertStatus(200)
                 ->assertJsonCount(5);

   }

   #[Test]
   public function it_can_create_a_note()
   {
        $data = [
            'title' => 'Nova Nota',
            'body' => 'Conteúdo da nova nota',
        ];

        $response = $this->post('api/note', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('notes', [
            'title' => 'Nova Nota',
            'body' => 'Conteúdo da nova nota',
        ]);

        $response->assertJsonFragment([
            'title' => 'Nova Nota',
            'body' => 'Conteúdo da nova nota',
        ]);
   }

   #[Test]
   public function it_can_show_a_note()
   {
        $note = Note::factory()->create();

        $response = $this->get("api/note/{$note->id}");

        $response->assertStatus(200);

        $response->assertJson([
            'id' => $note->id,
            'title' => $note->title,
            'body' => $note->body
        ]);
   }

   #[Test]
   public function it_can_update_a_note()
   {
        $note = Note::factory()->create();

        $data = [
            'title' => 'Nota Atualizada',
            'body' => 'Conteúdo atualizado'
        ];

        $response = $this->put("api/note/{$note->id}", $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('notes', [
            'id' => $note->id,
            'title' => 'Nota Atualizada',
            'body' => 'Conteúdo atualizado'
        ]);

        $response->assertJsonPath('id', (string)$note->id);

        $response->assertJsonFragment([
            'title' => 'Nota Atualizada',
            'body' => 'Conteúdo atualizado'
        ]);
   }
   
}
