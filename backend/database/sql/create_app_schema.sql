-- Execute uma vez no banco (ex.: psql -h 127.0.0.1 -U postgres -d portalcandidatodev -f database/sql/create_app_schema.sql)
-- Ajuste o nome do schema se mudar DB_SCHEMA no .env.

CREATE SCHEMA IF NOT EXISTS proensp;

GRANT USAGE ON SCHEMA proensp TO postgres;
GRANT CREATE ON SCHEMA proensp TO postgres;

ALTER DEFAULT PRIVILEGES IN SCHEMA proensp GRANT ALL ON TABLES TO postgres;
ALTER DEFAULT PRIVILEGES IN SCHEMA proensp GRANT ALL ON SEQUENCES TO postgres;
