-- PROCEDURE: public.delete_car_from_favorites(integer, integer)

-- DROP PROCEDURE IF EXISTS public.delete_car_from_favorites(integer, integer);

CREATE OR REPLACE PROCEDURE public.delete_car_from_favorites(
	IN fmodel_id integer,
	IN fuser_id integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
    DELETE FROM favorites WHERE car_id = fmodel_id AND user_id = fuser_id;
end;
$BODY$;
ALTER PROCEDURE public.delete_car_from_favorites(integer, integer)
    OWNER TO rcadmin;
