import {afterAll, beforeAll, describe, expect, it, vi} from "vitest";
import {mount, shallowMount} from "@vue/test-utils";
import vuetify from "../../src/plugins/vuetify";
import SigninFormComponent from "../../src/components/Auth-Forms/SigninFormComp.vue";

describe('Компонент SigninForm', () => {
    let wrapper;

    beforeAll(() => {
        wrapper = mount(SigninFormComponent, {
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
        expect(wrapper.find('[data-testid="pass-text-field"]').exists()).toBe(true);
    })

    it('Отрендерена кнопка ', async () => {
        expect(wrapper.find('[data-testid="auth-btn"]').exists()).toBe(true);
    })
})