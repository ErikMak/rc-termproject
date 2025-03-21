import { createStore } from 'vuex';
import {describe, it, expect, vi, beforeEach, beforeAll, afterAll} from 'vitest';
import storeModule from '../../src/store/modules/Catalog';
import MockAdapter = require("axios-mock-adapter");
import axios from '../../src/plugins/axios'
import Api from '../../src/common/cars'

describe('Каталог машин для аренды', () => {
    let store;
    let mock

    const data = {
        "status": true,
        "data": [
            {
                "model_id": 1,
                "name": "Mazda6",
                "category": "Легковая",
                "brand": "Mazda",
                "type": "седан",
                "price": "16",
                "country": "Япония",
                "weight": "1400",
                "tank": "62",
                "year": 2016,
                "img": "01.png",
                "flag": "japan.png"
            },
            {
                "model_id": 2,
                "name": "Cayenne",
                "category": "Премиум",
                "brand": "Porsche",
                "type": "SUV",
                "price": "48",
                "country": "Германия",
                "weight": "2110",
                "tank": "85",
                "year": 2017,
                "img": "02.png",
                "flag": "germany.png"
            },
        ]
    }

    beforeAll(() => {
        mock = new MockAdapter(axios);

        store = createStore({
            modules: {
                cars: storeModule,
            },
        });
    })

    afterAll(() => {
        mock.reset()
    })


    it('Прелоудер отключается, когда каталог загружен', () => {
        const sample = {};

        mock.onGet("/api/cars?").reply(200, []);

        store.dispatch = vi.fn().mockImplementation((action) => {
            if (action === 'uploadCatalogCars') {
                store.commit('activatePreloaders');
                Api.getAllCars(sample, (res: any) => {
                    store.commit('updateCatalogCars', res.data);

                    expect(store.state.cars.cars).toEqual([]);
                    expect(store.state.cars.preloaderShow).toBe(false);
                })
            }
        });


        expect(store.state.cars.preloaderShow).toBe(true);
        store.dispatch('uploadCatalogCars', sample);
    });

    it('Обновление каталога машин данными, полученными с API', () => {
        const sample = {};

        mock.onGet("/api/cars?").reply(200, data);
        store.dispatch = vi.fn().mockImplementation((action) => {
            if (action === 'uploadCatalogCars') {
                store.commit('activatePreloaders');
                Api.getAllCars(sample, (res: any) => {
                    store.commit('updateCatalogCars', res.data);

                    expect(store.state.cars.cars).toEqual(data.data);
                    expect(store.state.cars.preloaderShow).toBe(false);
                })
            }
        });

        store.dispatch('uploadCatalogCars', sample);
    });

    it('Возврат каталога машин с геттера', () => {
        const mockData = data.data;
        store.commit('updateCatalogCars', mockData);

        const cars = store.getters.getCatalogCars;

        expect(cars).toEqual(mockData);
    });

    it('Возврат статуса прелоудера с геттера', () => {
        store.commit('activatePreloaders');

        const preloaderState = store.getters.getCatalogPreloader;

        expect(preloaderState).toBe(true);
    });
});