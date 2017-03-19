# ange007/omnipay-interkassa

## [0.1.3] - 2017-03-19

- Code optimization.
- **/src/Message/CompletePurchase(Request|Response).php** rename to **Notification(Request|Response)**. And added new **CompletePurchase(Request|Response)** with other functions.
- Added `acceptNotification()` function for accept notification from interkassa.
- Realized `isPending()` checking.
- Now `completePurchase()` function need used after return from interkassa.
- **/tests/** are temporarily removed as aren't realized.
- **/docs/** removed as unnecessary.

## [Development started] - 2017-03-17
## [Based on] - hiqdev/omnipay-interkassa