import {afterAll, beforeAll, describe, expect, it, vi} from "vitest";
import {mount, shallowMount} from "@vue/test-utils";
import vuetify from "../../src/plugins/vuetify";
import SignupFormComponent from "../../src/components/Auth-Forms/SignupFormComp.vue";

describe('Компонент SignupForm', () => {
    let wrapper;

    beforeAll(() => {
        wrapper = mount(SignupFormComponent, {
            global: {
                plugins: [vuetify],
                stubs: ['FontAwesomeIcon']
            },
        })
    })

    afterAll(() => {
        wrapper.unmount()
    })


    it('Отрендерены поля ввода', () => {
        expect(wrapper.find('[data-testid="username-text-field"]').exists()).toBe(true);
        expect(wrapper.find('[data-testid="confirm-pass-text-field"]').exists()).toBe(true);
        expect(wrapper.find('[data-testid="pass-text-field"]').exists()).toBe(true);
    })

    it('Отрендерена кнопка ', async () => {
        expect(wrapper.find('[data-testid="auth-btn"]').exists()).toBe(true);
    })
})