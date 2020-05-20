<?php

/** Index route
    '/'
 */
// Render PHP template in route
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'index.php', [
        'name' => $args['name'] ?? null,
    ]);
})->setName('profile');

$app->get('/patients/{code}', function($request, $response, $args) {
    if($args['code']) {
        $personal_code = $args['code'];
        if ($personal_code) {
            $data = [];
            if(preg_match('/(^\d{1,6}$)|(\d{1,6}-$)|(\d{1,6}-\d{1,5}$)/', $args['code'])){
                $data = Patients::where('personal_code','like','%'.$args['code'].'%')->limit(10)->get();
            } else {
                return $response->withStatus(200)
                    ->write(json_encode(['error' => 'Personal code format incorrect']));
            }
        }
        if(isset($data) && json_encode($data, true) == "[]") {
            return $response->withStatus(200)
                ->write(json_encode(['error' => 'No data found']));
        }
        return $response->withStatus(200)
            ->write(json_encode($data, true));
    }
    return $response->withStatus(200)
        ->write(json_encode(['error'=>'No personal code given']));
});
