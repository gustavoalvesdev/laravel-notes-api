<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    private $array;

    /**
     * @OA\Get( 
     *     path="/api/notes",
     *     summary="Lista todas as notas",
     *     @OA\Response(response=200, description="Lista todas as notas")
     * )
     */
    public function all()
    {
        $notes = Note::all();
        
        foreach($notes as $note) {
            $this->array[] = [
                'id' => $note->id,
                'title' => $note->title
            ];
        }
        
        return $this->array;
    }

    /**
     * @OA\Get(
     *     path="/api/notes/{id}",
     *     summary="Lista uma nota específica",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID da nota"),
     *     @OA\Response(response=200, description="Lista uma nota específica")
     * )
     */
    public function one($id)
    {
        $note = Note::find($id);

        if ($note) {
            $this->array = $note;
        } else {
            $this->array['error'] = 'ID não encontrado';
        }

        return $this->array;
    }

    /**
     * @OA\Post(
     *     path="/api/notes",
     *     summary="Cria uma nova nota",
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/Note")
     *     ),
     *     @OA\Response(response=200, description="Cria uma nova nota")
     * )
     */
    public function new(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');

        if ($title && $body) {
            $note = new Note();

            $note->title = $title;
            $note->body = $body;

            $note->save();

            $this->array = $note;


        } else {
            $this->array['error'] = 'Campos obrigatórios [title, body] não enviados';
        }

        return $this->array;
    }

    /**
     * @OA\Put(
     *     path="/api/notes/{id}",
     *     summary="Edita uma nota",
     *     @OA\Parameter(name="id", in="path", required=true, description="ID da nota"),
     *     @OA\RequestBody(
     *         @OA\JsonContent(ref="#/components/schemas/Note")
     *     ),
     *     @OA\Response(response=200, description="Edita uma nota")
     * )
     */
    public function edit(Request $request, $id)
    {
        $title = $request->input('title');
        $body = $request->input('body');

        if ($id && $title && $body) {

            $note = Note::find($id);

            if ($note) {

                $note->title = $title;
                $note->body = $body;
                $note->save();

                $this->array = [
                    'id' => $id, 
                    'title' => $title,
                    'body' => $body
                ];

            } else {
                $this->array['error'] = 'ID inexistente';
            }

        } else {
            $this->array['error'] = 'Campos [id, title e body] obrigatórios não enviados';
        }

        return $this->array;
    }

    /**
     * @OA\Delete(
     *     path="/api/notes/{id}",
     *     summary="Deleta uma nota",       
     *     @OA\Parameter(name="id", in="path", required=true, description="ID da nota"),
     *     @OA\Response(response=200, description="Deleta uma nota")
     * )
     */
    public function delete($id) 
    {

        $this->array = [];

        if ($id) {

            $note = Note::find($id);

            if ($note) {
                $note->delete();

                $this->array['result'] = [
                    'id' => $id
                ];
            } else {
                $this->array['error'] = 'ID inexistente.';
            }

        } else {
            $this->array['error'] = 'ID não informado';
        }

        return $this->array;
    }
}
