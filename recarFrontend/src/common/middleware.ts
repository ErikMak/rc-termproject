export default class requestMiddlewareService {
    static requestLimit = 5;
    static timeFrame = 20000;
    static requestCount = 0;
    static firstRequestTime: null | number = null;

    static checkRequestLimit() {
        const currentTime = Date.now();

        if (this.firstRequestTime === null) {
            this.firstRequestTime = currentTime;
        }

        if (currentTime - this.firstRequestTime > this.timeFrame) {
            this.requestCount = 0;
            this.firstRequestTime = currentTime;
        }

        if (this.requestCount >= this.requestLimit) {
            throw new Error('request_limit');
        }

        this.requestCount++;
    }
}