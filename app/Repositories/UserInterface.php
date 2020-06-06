<?php

namespace App\Repositories;

interface UserInterface
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllUsers();

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id);



    /**
     * @return \Illuminate\Support\Collection
     */

    public function gitMyProduct();

    /**
     * @param $id
     */
    public function deleteUser($id);


    /**
     * @return \Illuminate\Support\Collection
     */
    public function ShowMyDetails();


}
