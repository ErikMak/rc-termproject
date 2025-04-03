CREATE OR REPLACE FUNCTION public.get_min_price_by_model(
	p_model_id integer)
    RETURNS numeric
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
AS $BODY$
BEGIN
    RETURN (SELECT MIN(price) FROM equipment WHERE model_id = p_model_id);
END;
$BODY$;