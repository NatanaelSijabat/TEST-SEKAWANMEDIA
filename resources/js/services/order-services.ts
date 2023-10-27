import { FieldType, FieldTypeUpdate } from "@/types";
import axios from "axios";

const baseURL = `${import.meta.env.VITE_BASE_API}`;

const headers = {
    'Content-Type': 'application/json',
}

export const doGetUserss = async (): Promise<any> => {
    try {
        const result = await axios({
            url: `${baseURL}/users`,
            method: 'GET',
            headers
        })
        return result.data
    } catch (error) {
        console.log(error)
    }
}
export const doGetOrders = async (): Promise<any> => {
    try {
        const result = await axios({
            url: `${baseURL}/orders`,
            method: 'GET',
            headers
        })
        return result.data
    } catch (error) {
        console.log(error)
    }
}

export const doCreateOrders = async (data: FieldType): Promise<any> => {
    try {
        const result = await axios({
            url: `${baseURL}/orders`,
            method: 'POST',
            headers,
            data
        })
        return result.data
    } catch (error) {
        console.log(error)
    }
}

export const doUpdateOrders = async (data: FieldTypeUpdate): Promise<any> => {
    try {
        const result = await axios({
            url: `${baseURL}/orders/${data.id}`,
            method: 'PATCH',
            headers,
            data
        })
        return result.data
    } catch (error) {
        console.log(error)
    }
}



export const doGetAll = async (): Promise<any> => {
    try {
        const result = await axios({
            url: `${baseURL}/all`,
            method: "GET",
            headers
        })
        return result.data
    } catch (error) {
        console.log(error)
    }
}

export const doGetAllById = async (id: any): Promise<any> => {
    try {
        const result = await axios({
            url: `${baseURL}/all/${id}`,
            method: "GET",
            headers
        })
        return result.data
    } catch (error) {
        console.log(error)
    }
}
