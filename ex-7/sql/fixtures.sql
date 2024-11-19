CREATE TABLE IF NOT EXISTS stuff (
    id SERIAL PRIMARY KEY,
    name VARCHAR NOT NULL
);

INSERT INTO stuff(name) VALUES
    ('Kubernetes'),
    ('Mercure'),
    ('Vulcain'),
    ('API Platform'),
    ('FrankenPHP')
;

