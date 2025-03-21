import {beforeAll, describe, afterAll, it, afterEach, expect, vi} from "vitest";
import {mount} from "@vue/test-utils";
import vuetify from "../../src/plugins/vuetify";
import CommentInputComponent from '../../src/components/Comments/CommentInputComp.vue'
import axios from "../../src/plugins/axios";
import MockAdapter = require("axios-mock-adapter");

describe('Компонент Comment Input', () => {
    let wrapper
    let c_input
    let mock

    const text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor " +
        "incididunt ut labore et dolore magna aliqua. Ut enim ad " +
        "minim veniam, quis nostrud exercitation ullamco laboris " +
        "nisi ut aliquip ex ea commodo consequat. Duis aute irure " +
        "dolor in reprehenderit in voluptate velit esse cillum dolore eu"

    beforeAll(() => {
        mock = new MockAdapter(axios);

        wrapper = mount(CommentInputComponent, {
            global: {
                plugins: [vuetify],
                stubs: ['FontAwesomeIcon']
            },
        })

        c_input = wrapper.find('#comment-text')
    })

    afterAll(() => {
        mock.reset()
        wrapper.unmount()
    })

    afterEach(async () => {
        await c_input.setValue('')
    })

    it('Данные вводятся в поле ввода', async () => {
        await c_input.setValue(text)

        expect(c_input.element.value).toBe(text)
    })

    it('Выводится сообщение об ошибках при валидации', async () => {
        await wrapper.vm.sendComment();

        let err_messages = wrapper.findAll('.v-messages__message')
        const err_text_1 = err_messages[0].text()

        await c_input.setValue(text+';;')

        await wrapper.vm.sendComment();

        err_messages = wrapper.findAll('.v-messages__message')
        const err_text_2 = err_messages[0].text()

        expect(err_messages[0].exists()).toBe(true);
        expect(err_text_1).toBe('Комментарий не может быть пустым!');

        expect(err_messages[0].exists()).toBe(true);
        expect(err_text_2).toBe('Присутсвуют недоспутимые символы или длина комментария превышает 500 символов!');
    })

    it('Поле успешно проходит валидацию', async () => {
        mock.onGet("/api/auth/user").reply(200, {
            "error": "Unauthorized"
        });

        await c_input.setValue(text)

        await wrapper.vm.sendComment();

        const err_messages = wrapper.findAll('.v-messages__message')
        expect(err_messages[0].exists()).toBe(true);
        expect(err_messages[0].text()).toBe('');
    })
})