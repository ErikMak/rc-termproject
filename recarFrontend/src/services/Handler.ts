export default class Handler {
    nextHandler : any
    constructor() {
        this.nextHandler = null;
    }

    setNext(handler: any) {
        this.nextHandler = handler;
        return handler;
    }

    handle(request: any) {
        if (this.nextHandler) {
            return this.nextHandler.handle(request);
        }
        return null;
    }
}