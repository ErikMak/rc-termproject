import Handler from "@/services/Handler";

type ShowErrorFun = (msg: string[]) => void

class ErrorHandler extends Handler {
    property: string
    showError: ShowErrorFun

    constructor(property: string, showError: ShowErrorFun) {
        super();
        this.property = property
        this.showError = showError
    }

    handle(err: any) {
        if(err.error.hasOwnProperty(this.property)) {
            const msg = err.error[this.property]
            this.showError(msg)
            return
        }

        return super.handle(err)
    }
}

export const createErrorChain = (properties: string[] = [], showError: ShowErrorFun) => {
    const serverHandlers = [new ErrorHandler('server', showError),
        new ErrorHandler('request_limit', showError)]
    const customHandlers = properties.map(property => new ErrorHandler(property, showError))

    const handlers = [...serverHandlers, ...customHandlers]

    for (let i = 0; i < handlers.length - 1; i++) {
        handlers[i].setNext(handlers[i + 1])
    }

    return handlers[0]
}