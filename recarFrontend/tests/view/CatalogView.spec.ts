import {afterEach, beforeAll, beforeEach, describe, expect, it} from "vitest";
import axios from '../../src/plugins/axios'
import {mount} from "@vue/test-utils";
import vuetify from "../../src/plugins/vuetify";
import CatalogView from '../../src/views/CatalogView.vue'
import store from "../../src/store";
import router from "../../src/router";
import MockAdapter = require("axios-mock-adapter");

describe('Каталог автомобилей', () => {
    let wrapper
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
            {
                "model_id": 3,
                "name": "Land Cruiser",
                "category": "Внедорожник",
                "brand": "Toyota",
                "type": "SUV",
                "price": "62",
                "country": "Япония",
                "weight": "2510",
                "tank": "93",
                "year": 2017,
                "img": "03.png",
                "flag": "japan.png"
            },
            {
                "model_id": 4,
                "name": "A4",
                "category": "Легковой",
                "brand": "Audi",
                "type": "седан",
                "price": "26",
                "country": "Германия",
                "weight": "1540",
                "tank": "54",
                "year": 2019,
                "img": "04.png",
                "flag": "germany.png"
            },
        ]
    }

    beforeAll(() => {
        mock = new MockAdapter(axios);

        mock.onGet('/api/cars?').reply(200, data);

        wrapper = mount(CatalogView, {
            global: {
                plugins: [vuetify, store, router],
                stubs: ['FontAwesomeIcon'],
                mocks: {
                    $route: {
                        params: {
                        },
                        query: {
                        }
                    },
                }
            },
        })
    });

    afterEach(() => {
        mock.restore();
        wrapper.unmount()
    });


    it('Загружается каталог автомобилей', async () => {
        await wrapper.vm.$nextTick();

        const posts = wrapper.findAll('[data-testid="card"]')
        expect(posts.length).toBe(4)
    })
})