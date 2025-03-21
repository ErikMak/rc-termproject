import type {EngineType} from "@/types/IEngineData";

interface Equipment {
    equip_id: number
    name: string,
    transmission: string,
    engine: EngineType,
    is_exist: boolean,
    drive: string,
    fuel: number
}



export type { Equipment as EquipmentType }