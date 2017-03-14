<?php

namespace Brime\Controllers;

use Brime\Core\Controller;
use Brime\Core\Http;
use Brime\Core\Request;

use Brime\Models\Notes;

class NotesController extends Controller
{
    private $Request;

    private $notes;
    public function __construct()
    {
        $this->Request = new Request();

        $this->notes = new Notes();
        parent::__construct();
    }


    public function get($userId, $noteId='')
    {


        if ($noteId === '') {
            // TODO: Show all the notes
        }


    }

    public function add()
    {
        if ($this->Request->isPost()) {
            if (isset($_POST['title'], $_POST['content'], $_POST['label'], $_POST['author'])) {
                $title = strip_tags($_POST['title']);
                $content = strip_tags($_POST['content']);
                $label = strip_tags($_POST['label']);
                $author = strip_tags($_POST['author']);
                if (!$this->notes->addNote($title, $content, $label, $author)) {
                    $this->View->renderJSON(
                        [
                            'message' => 'Could not add note'
                        ],
                        Http::STATUS_BAD_REQUEST
                    );
                } else {
                    $this->View->renderJSON(
                        [
                            'message' => 'Note added successfully'
                        ],
                        Http::STATUS_OK

                    );
                }
            }
        } else {
            $this->View->renderJSON(
                [
                    'message' => 'You should not be here'
                ],
                Http::STATUS_FORBIDDEN);
        }
    }

    public function update() {}
    public function delete() {}
}