import axios from "axios";

const token = localStorage.getItem('token')

export const request = axios.create({
    baseURL: process.env.MIX_API_URL,
    headers: {
        Authorization: `Bearer ${token}`
    }
})
