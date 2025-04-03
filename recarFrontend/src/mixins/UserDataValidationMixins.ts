import {BaseValidation} from "@/mixins/BaseValidationMixins";
import {ValidationService} from "@/services/ValidationService";

interface UserDataErrors {
    exp: string
    gender: string
}

export class UseUserDataValidation extends BaseValidation<UserDataErrors> {
    constructor() {
        super({
            exp: '',
            gender: ''
        });
    }

    checkGender(context: any): boolean {
        const rv_gender = /^(Мужской|Женский)$/u;

        return ValidationService.checkField({
            context: context, regex: rv_gender, ref: 'gender', errorMessage: 'Некорректный пол'
        })
    }

    checkExp(context: any): boolean {
        const rv_exp = /^(100|[1-9]?[0-9])$/u;

        return ValidationService.checkField({
            context: context, regex: rv_exp, ref: 'exp', errorMessage: 'Некорректный стаж'
        })
    }
}