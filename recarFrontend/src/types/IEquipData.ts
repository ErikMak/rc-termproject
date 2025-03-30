import type {EngineType} from "@/types/IEngineData";

interface Equipment {
    equip_id: number
    name: string,
    transmission: string,
    car_engine: EngineType,
    is_exist: boolean,
    drive: string,
    lat: string
    long: string
    price: string
    fuel: number
}



export type { Equipment as EquipmentType }