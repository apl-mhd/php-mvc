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
            $db = new PDO('mysql:host=127.0.0.1;dbname=blog', 'root', 'admin', []);

            $name = 'e';
            $slug = 'e';
            $created_at = date('Y-m-d H:m:i', strtotime('07/11/2022 9:00PM'));
            $query = 'INSERT into categories(name, slug, created_at, updated_at) VALUES(:name, :slug, :created_at, :updated_at)';
            $stmt = $db->prepare($query);
            
            $stmt->bindValue('name', $name);
            $stmt->bindValue('slug', $slug);
            $stmt->bindValue('created_at', $created_at);
            $stmt->bindValue('updated_at', $created_at);
            $stmt->execute();
            // $stmt->execute([
            //     'name' => $name,
            //      'slug' => $slug,
            //       'created_at' => $created_at
            // ]);
            // $stmt->execute([
            //     'name' => $name,
            //      'slug' => $slug,
            //       'created_at' => $created_at
            // ]);
            $id = $db->lastInsertId();
            $category = $db->query('select * from categories where id = ' . $id)->fetch();

            echo '<pre>';
                var_dump($category);
            echo '</pre>';
            

        }
        catch(PDOException $e){
            throw new \PDOException($e->getMessage(), $e->getCode());
        }

        return View::make('index');
    }


    public function upload()
    {
    
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');

    }

   
}