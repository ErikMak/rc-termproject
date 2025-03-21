import {describe, expect, it, test, vi} from 'vitest'
import {createErrorChain} from "../../src/services/ErrorHandler";

describe('Сервис ErrorHandler', () => {
    // Запрос возвращает ошибку
    const err = {
        status: false,
        error: {
            server: ["Неправильный логин или пароль!"],
            car_id: ["Машины с таким ID не найдено!"],
            username: ["Неверное имя пользователя!"]
        }
    }

    const err_2 = {
        status: false,
        error: {
            car_id: ["Машины с таким ID не найдено!"],
            username: ["Неверное имя пользователя!"]
        }
    }

    const f_1 = (msg: string[]) => {
        expect(msg.pop()).toBe("Машины с таким ID не найдено!")
    }

    const f_2= vi.fn(() => 0)

    const f_3 = (msg: string[]) => {
        expect(msg.pop()).toBe("Неправильный логин или пароль!")
    }

    it('Выводит сообщение об ошибке', () => {
        const properties = [
            'car_id'
        ]

        const errorHandler = createErrorChain(properties, f_1)

        errorHandler.handle(err_2)
    })

    it('Ошибки обрабатываются', () => {
        const properties = [
            'car_id'
        ]

        const errorHandler = createErrorChain(properties, f_2)

        errorHandler.handle(err)

        expect(f_2).toHaveBeenCalled()
    })

    it('Обрабатывается цепочка ошибок', () => {
        const properties = [
            'car_id', 'username'
        ]

        const errorHandler = createErrorChain(properties, f_2)

        errorHandler.handle(err)

        expect(f_2).toHaveBeenCalledTimes(2)
    })

    it('Обрабатываются серверные ошибки', () => {

        const errorHandler = createErrorChain([], f_3)

        errorHandler.handle(err)
    })
})