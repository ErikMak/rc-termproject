import {beforeAll, it, describe, vi, expect, afterAll} from "vitest";
import axios from "../../src/plugins/axios";
import MockAdapter = require("axios-mock-adapter");
import {createStore} from "vuex";
import storeModule from "../../src/store/modules/Car";
import Api from "../../src/common/equipments";

describe('Каталог машин для аренды', () => {
    let store;
    let mock

    const data = {
        "status": true,
        "data": [
            {
                "equip_id": 1,
                "name": "2.0 MT Suprime",
                "transmission": "МКПП",
                "engine": {
                    "engine_id": 1,
                    "mark": "PEY5",
                    "HP": 145,
                    "volume": "2.0",
                    "fuel": "АИ-95",
                    "type": "Рядный, 4-цилиндровый"
                },
                "is_exist": false,
                "fuel": 0,
                "drive": "Передний"
            },
            {
                "equip_id": 2,
                "name": "2.0 AT Suprime",
                "transmission": "АКПП",
                "engine": {
                    "engine_id": 1,
                    "mark": "PEY5",
                    "HP": 145,
                    "volume": "2.0",
                    "fuel": "АИ-95",
                    "type": "Рядный, 4-цилиндровый"
                },
                "is_exist": true,
                "fuel": 32,
                "drive": "Передний"
            },
            {
                "equip_id": 3,
                "name": "2.5 AT Suprime",
                "transmission": "АКПП",
                "engine": {
                    "engine_id": 2,
                    "mark": "PYY1",
                    "HP": 192,
                    "volume": "2.5",
                    "fuel": "АИ-95",
                    "type": "Рядный, 4-цилиндровый"
                },
                "is_exist": true,
                "fuel": 63,
                "drive": "Передний"
            }
        ]
    }


    beforeAll(() => {
        mock = new MockAdapter(axios);

        store = createStore({
            modules: {
                car: storeModule,
            },
        });
    })

    afterAll(() => {
        mock.reset()
    })

    it('Обновление комплектаций машин данными, полученными с API', () => {
        const sample = {id: 1}

        mock.onGet("/api/equipments/1?").reply(200, data);
        store.dispatch = vi.fn().mockImplementation((action) => {
            if (action === 'uploadCarEquipments') {
                Api.getEquipmentsById(sample, (res: any) => {
                    store.commit('updateEquipments', res.data);

                    expect(store.state.car.equipments).toEqual(data.data);
                })
            }
        });

        store.dispatch('uploadCarEquipments', sample);
    })

    it('Возврат каталога комлектаций машин с геттера', () => {
        const mockData = data.data;
        store.commit('updateEquipments', mockData);

        const equipments = store.getters.getCarEquipments;

        expect(equipments).toEqual(mockData);
    });
})