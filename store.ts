import {persistReducer,persistStore} from "redux-persist";
import {configureStore} from "@reduxjs/toolkit";
import storage from 'redux-persist/lib/storage'
import authSlice from "./src/utilities/auth/authSlice";

const persistConfig = {
    key: 'root',
    storage
}

const persistedReducer = persistReducer(persistConfig, authSlice)

const store = configureStore({
    reducer:{
        auth: persistedReducer
    },
    middleware: (getDefaultMiddleware) =>
        getDefaultMiddleware({
            serializableCheck: false,
        })
})

const persistor = persistStore(store)

export type AppDispatch = typeof store.dispatch

export { store, persistor }
