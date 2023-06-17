<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\App;
use App\View;
use Exception;
use PDO;
use PDOException;


class HomeController{

    public function index(): View{

        $db = App::db();

            $name = 'name';
            $userName = 'username7';
            $email = 'mail7@mail.ocm';
            $password =  'password';
            $isAdmin = true;

            $categoryId = 1;
            $title = 'title';

            try{
            $db->beginTransaction();

            $newUserStmt = $db->prepare(
                'INSERT INTO users(name, username, email, password, is_admin, created_at)  VALUES(?, ?, ?, ?, ?, now())'
            );

            $newPostStmt = $db->prepare('INSERT INTO posts(user_id, category_id, title, created_at) VALUES(?, ?, ?, now())');

            $newUserStmt->execute([$name, $userName, $email, $password, $isAdmin]);

            $id = (int)$db->lastInsertId();

            $newPostStmt->execute([$id, $categoryId, $title]);

            $db->commit();

            }

            catch(\Throwable $e){
                $db->rollBack();
            }
         
            $fetchStmt = $db->prepare('SELECT posts.id AS post_id, title, category_id FROM posts 
                INNER JOIN users ON user_id = users.id
                WHERE user_id = ?
            ');

            $fetchStmt->execute([1]);

            echo '<pre>';
                var_dump($fetchStmt->fetch(PDO::FETCH_ASSOC));
            echo '</pre>';
            
        return View::make('index');
    }


    public function upload()
    {
    
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');

    }

   
}