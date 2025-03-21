import {afterAll, beforeAll, describe, expect, it, vi} from "vitest";
import axios from "../../src/plugins/axios";
import {createStore} from "vuex";
import storeModule from "../../src/store/modules/Comments";
import MockAdapter = require("axios-mock-adapter");
import Api from "../../src/common/comments";

describe('Каталог машин для аренды', () => {
    let store;
    let mock

    const data = {
        "status": true,
        "data": [
            {
                "id": 15,
                "user": "slumar",
                "text": "Vel laboriosam ut accusamus at eum. Sunt facilis molestiae ut voluptatibus. Et ipsam assumenda rerum possimus sit veniam necessitatibus. Et aspernatur aut similique.",
                "rating": "1.5",
                "created_at": "2024-05-09T15:37:42.000000Z"
            }
        ]
    }

    const data_2 = {
        "status": true,
        "data": [
            {
                "id": 15,
                "user": "slumar",
                "text": "Vel laboriosam ut accusamus at eum. Sunt facilis molestiae ut voluptatibus. Et ipsam assumenda rerum possimus sit veniam necessitatibus. Et aspernatur aut similique.",
                "rating": "1.5",
                "created_at": "2024-05-09T15:37:42.000000Z"
            },
            {
                "id": 16,
                "user": "usertest",
                "text": "Vel laboriosam ut accusamus at eum.",
                "rating": "1.5",
                "created_at": "2024-05-09T15:37:42.000000Z"
            }
        ]
    }

    beforeAll(() => {
        mock = new MockAdapter(axios);

        store = createStore({
            modules: {
                comments: storeModule,
            },
        });
    })

    afterAll(() => {
        mock.reset()
    })


    it('Обновление комментариев данными, полученными с API', () => {
        const sample = {model_id: 1};

        mock.onGet("/api/comments/1?").reply(200, data);
        store.dispatch = vi.fn().mockImplementation((action) => {
            if (action === 'uploadComments') {
                Api.getCarComments(sample, (res: any) => {
                    store.commit('updateComments', res.data);

                    expect(store.state.comments.comments).toEqual(data.data);
                })
            }
        });

        store.dispatch('uploadCatalogCars', sample);
    })

    it('Возврат комментариев с геттера', () => {
        const mockData = data.data;
        store.commit('updateComments', mockData);

        const comments = store.getters.getComments;

        expect(comments).toEqual(mockData);
    });

    it('Добавление нового комментария', () => {
        const mockData = data_2.data;

        store.commit('pushComment', {
            "id": 16,
            "user": "usertest",
            "text": "Vel laboriosam ut accusamus at eum.",
            "rating": "1.5",
            "created_at": "2024-05-09T15:37:42.000000Z"
        });

        expect(store.state.comments.comments).toEqual(data_2.data);
    });
})