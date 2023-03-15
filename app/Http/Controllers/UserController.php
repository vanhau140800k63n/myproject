<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserInfoDetail($id)
    {
        $user = $this->userRepository->getUserById($id);
        return view('pages.user.detail', compact('user'));
    }

    public function listUser()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dichthuatphuongdong.com/tienich/do.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'action=ten_tieng_viet_random&gender=male&is_fullname=yes&surname_option=select&surname=Nguyễn&so_luong=16&exclude=&lang=vi',
            CURLOPT_HTTPHEADER => array(
                'Host: dichthuatphuongdong.com',
                'Cookie: PHPSESSID=6849cc6dc4de50b8d1f5985bcecf0bc1; _ga=GA1.1.180132158.1678784778; __gads=ID=9b32a5382766635b-2234b6f1fbdb004f:T=1678784778:RT=1678784778:S=ALNI_MbtYAcL5yDneY27kMo2gaNvfQ5beQ; __gpi=UID=00000bd9614b9f63:T=1678784778:RT=1678784778:S=ALNI_Mbzzs20iKiMzdTcmBQzTeckCYt1Dg; _ga_QNF8ZRW013=GS1.1.1678784777.1.1.1678784787.50.0.0; FCNEC=%5B%5B%22AKsRol870Fjy3Qiy66rAWXvxwQ_ir8HHjr2kBPpIAb1ID6H5FQUKXA6DQ78nawcSJGGzr3edGk47BOf5CY2c2SDDmYwS6O3oybYKF7CDjTN-oR46RH6Zol4NM4l8y_Q8Qlpic_ElTl7vEkQARmn_MWtkrq7MfYflwA%3D%3D%22%5D%2Cnull%2C%5B%5D%5D',
                'sec-ch-ua: "Google Chrome";v="111", "Not(A:Brand";v="8", "Chromium";v="111"',
                'sec-ch-ua-platform: "Android"',
                'sec-ch-ua-mobile: ?1',
                'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36',
                'content-type: application/x-www-form-urlencoded',
                'accept: */*',
                'origin: https://dichthuatphuongdong.com',
                'sec-fetch-site: same-origin',
                'sec-fetch-mode: cors',
                'sec-fetch-dest: empty',
                'referer: https://dichthuatphuongdong.com/tienich/random-ten-tieng-viet.html',
                'accept-language: en-US,en;q=0.9'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = substr($response, 0, strpos($response, '|'));
        $response = explode(',', $response);
        foreach ($response as $user) {
            $data = [
                'email' => $this->generateRandomString(),
                'last_name' => substr($user, 0, strpos($user, 'Nguyễn') - 1),
                'first_name' => 'Nguyễn'
            ];

            $user = $this->userRepository->createUser($data);
        }

        return '';
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
