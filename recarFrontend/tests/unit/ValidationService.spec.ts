import {describe, expect, it} from "vitest";
import {ValidationService} from "../../src/services/ValidationService";

describe('Сервис ValidationService', () => {
    const rv_username = /^(?=.{1,30}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/

    const context_valid = ({
        login: 'usertest',
        pass: 'Qwerty123',
        errors: {
            login: '',
            pass: ''
        }
    })

    const context_invalid = ({
        login: 'usertest;;',
        pass: '',
        errors: {
            login: '',
            pass: ''
        }
    })

    it('Выводит сообщения об ошибке', () => {
        const context_l = ({
            login: 'usertest;;',
            pass: 'Qwerty123',
            errors: {
                login: '',
                pass: ''
            }
        })

        const result = ValidationService.checkField({
            context: context_l, regex: rv_username, ref: 'login', errorMessage: 'Некорректный логин!'
        })

        expect(context_l.errors.login).toBe('Некорректный логин!')
    })

    it('Данные проходят проверку', () => {
        const result = ValidationService.checkField({
            context: context_valid, regex: rv_username, ref: 'login', errorMessage: 'Некорректный логин!'
        })

        expect(result).toBeTruthy()
    })

    it('Данные не проходят проверку', () => {
        const result = ValidationService.checkField({
            context: context_invalid, regex: rv_username, ref: 'login', errorMessage: 'Некорректный логин!'
        })

        expect(result).toBeFalsy()
    })

})