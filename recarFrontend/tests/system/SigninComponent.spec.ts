import {afterAll, afterEach, beforeAll, describe, expect, it, vi} from "vitest";
import {mount} from "@vue/test-utils";
import vuetify from "../../src/plugins/vuetify";
import SigninFormComponent from '../../src/components/Auth-Forms/SigninFormComp.vue'

describe('Компонент SigninForm', () => {
    let wrapper
    let u_input
    let p_input

    beforeAll(() => {
        wrapper = mount(SigninFormComponent, {
            global: {
                plugins: [vuetify],
                stubs: ['FontAwesomeIcon']
            },
        })

        u_input = wrapper.find('#username')
        p_input = wrapper.find('#password')
    })

    afterAll(() => {
        wrapper.unmount()
    })

    afterEach(async () => {
        await u_input.setValue('')
        await p_input.setValue('')
    })

    it('Данные вводятся в поля ввода', async () => {
        await u_input.setValue('user')
        await p_input.setValue('Qwerty123')

        expect(u_input.element.value).toBe('user')
        expect(p_input.element.value).toBe('Qwerty123')
    })

    it('Выводятся сообщения об ошибках при валидации', async () => {
        await wrapper.vm.signinAction();

        const err_messages = wrapper.findAll('.v-messages__message')


        expect(err_messages[0].exists()).toBe(true);
        expect(err_messages[0].text()).toBe('Логин не может быть пустым!');
        expect(err_messages[1].exists()).toBe(true);
        expect(err_messages[1].text()).toBe('Пароль не может быть пустым!');
    })

    it('Все поля успешно проходят валидацию', async () => {
        await u_input.setValue('username')
        await p_input.setValue('Qwerty123')

        await wrapper.vm.signinAction();

        const err_messages = wrapper.findAll('.v-messages__message')
        expect(err_messages.length).toBe(0);
    })

    it('Одно поле не проходит валидацию', async () => {
        await u_input.setValue('')
        await p_input.setValue('Qwerty123')

        await wrapper.vm.signinAction();

        const err_messages = wrapper.findAll('.v-messages__message')
        expect(err_messages.length).toBe(1);
    })

    it('Вызывается событие смены формы на форму авторизации', async () => {
        wrapper.find('#change-form').trigger('click')

        expect(wrapper.emitted()).toHaveProperty('changeForm')
    })

    it('Вызывается метод signinAction при submit событии', async () => {
        const form = wrapper.find("#signin")
        const handleSubmitSpy = vi.spyOn(wrapper.vm, 'signinAction')

        await form.trigger('submit')
        expect(handleSubmitSpy).toHaveBeenCalled();
    })
})