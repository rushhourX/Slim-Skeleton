<?php
// Routes

// get all todos
    $app->get('/todos', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM tasks ORDER BY task");
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
// Retrieve todo with id
    $app->get('/todo/[{id}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM tasks WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $todos = $sth->fetchObject();
        return $this->response->withJson($todos);
    });

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
