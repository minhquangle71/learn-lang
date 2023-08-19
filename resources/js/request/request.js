import axios from "axios";

const token = ''

export const request = axios.create({
    baseURL: process.env.MIX_API_URL,
    headers: {
        Authorization: `Bearer ${token}`
    }
})
