<?php

declare(strict_types = 1);

namespace App\Controllers;
use App\View;
use Exception;
use PDO;
use PDOException;

class HomeController{

    public function index(): View{

       try{
            $db = new PDO(
                'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABSE'],
                 $_ENV['DB_USER'],
                 $_ENV['DB_PASS']
            );
       }
        catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
            $name = 'name';
            $userName = 'username4';
            $email = 'mail4@mail.ocm';
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