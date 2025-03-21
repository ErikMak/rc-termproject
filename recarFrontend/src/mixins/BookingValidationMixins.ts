import {BaseValidation} from "@/mixins/BaseValidationMixins";

interface BookingFormErrors {
    date_issue: string
    date_return: string
}

export class UseBookingValidation extends BaseValidation<BookingFormErrors>{
    constructor() {
        super({
            date_issue: '',
            date_return: ''
        });
    }

    checkDateIssue(context: any): boolean {
        let valid = false

        if(context.date_issue == null) {
            this.errors.value.date_issue = 'Укажите дату начала аренды'
        } else {
            valid = true
            this.errors.value.date_issue = ''
        }

        return valid
    }

    checkDateReturn(context: any) : boolean {
        let valid = false

        if(context.date_return == null) {
            this.errors.value.date_return = 'Укажите дату окончания аренды'
        } else {
            valid = true
            this.errors.value.date_return = ''
        }

        return valid
    }

    checkInterval(context: any) : boolean {
        let valid = false

        if(context.date_return - context.date_issue <= 0) {
            this.errors.value.date_return = 'Некорректный диапазон'
            this.errors.value.date_issue = 'Некорректный диапазон'
        } else {
            this.errors.value.date_return = ''
            this.errors.value.date_issue = ''
            valid = true
        }

        return valid
    }
}