import {describe, expect, it, beforeEach, beforeAll, afterEach, afterAll} from "vitest";
import {mount} from "@vue/test-utils";
import SignupFormComponent from "../../src/components/Auth-Forms/SignupFormComp.vue";
import vuetify from "../../src/plugins/vuetify";
import {vi} from "vitest";

describe('Компонент SignupForm', () => {
    let wrapper;
    let u_input;
    let p_input;
    let cp_input;

    beforeAll(() => {
        wrapper = mount(SignupFormComponent, {
            global: {
                plugins: [vuetify],
                stubs: ['FontAwesomeIcon']
            },
        })

        u_input = wrapper.find('#username')
        p_input = wrapper.find('#password')
        cp_input = wrapper.find('#confirm-pass')
    })

    afterAll(() => {
        wrapper.unmount()
    })

    afterEach(async () => {
        await u_input.setValue('')
        await p_input.setValue('')
        await cp_input.setValue('')
    })


    it('Данные вводятся в поля ввода', async () => {
        await u_input.setValue('user')
        await p_input.setValue('Qwerty123')
        await cp_input.setValue('Qwerty12')

        expect(u_input.element.value).toBe('user')
        expect(p_input.element.value).toBe('Qwerty123')
        expect(cp_input.element.value).toBe('Qwerty12')
    })

    it('Выводятся сообщения об ошибках при валидации', async () => {
        await wrapper.vm.signupAction();


        const err_messages = wrapper.findAll('.v-messages__message')


        expect(err_messages[0].exists()).toBe(true);
        expect(err_messages[0].text()).toBe('Некорректный логин!');
        expect(err_messages[1].exists()).toBe(true);
        expect(err_messages[1].text()).toBe('Некорректный пароль!');
        expect(err_messages[2].exists()).toBe(true);
        expect(err_messages[2].text()).toBe('Подтвердите пароль!');

    })

    it('Все поля успешно проходят валидацию', async () => {
        await u_input.setValue('username')
        await p_input.setValue('Qwerty123')
        await cp_input.setValue('Qwerty123')

        await wrapper.vm.signupAction();

        const err_messages = wrapper.findAll('.v-messages__message')
        expect(err_messages.length).toBe(0);
    })

    it('Два поля не проходят валидацию', async () => {
        await u_input.setValue('username;')
        await p_input.setValue('Qwerty123')
        await cp_input.setValue('Qwerty122')

        await wrapper.vm.signupAction();

        const err_messages = wrapper.findAll('.v-messages__message')
        expect(err_messages.length).toBe(2);
    })

    it('Вызывается событие смены формы на форму авторизации', async () => {
        wrapper.find('#change-form').trigger('click')

        expect(wrapper.emitted()).toHaveProperty('changeForm')
    })

    it('Вызывается метод signupAction при submit событии', async () => {
        const form = wrapper.find("#signup")
        const handleSubmitSpy = vi.spyOn(wrapper.vm, 'signupAction')

        await form.trigger('submit')
        expect(handleSubmitSpy).toHaveBeenCalled();
    })
});