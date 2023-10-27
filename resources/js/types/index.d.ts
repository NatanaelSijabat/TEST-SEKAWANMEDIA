import React from "react";

export interface User {
    id: number;
    email: string;
    employees_id: number;
    role_users_id: number
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
};

interface Role {
    name: string
}

export interface UserType {
    key: React.Key,
    id: number
    emai: string
    fullname: string
    role: Role[]
}

export interface DataTypeOrder {
    key: React.Key
    id: number
    nama_kendaraan: string
    lokasi: number
    IdKaryawan: number
    karyawan: string
    supervisor: string
    IdSupervisor: number
    manager: string
    IdManager: number
    status_manager: string
    status_supervisor: string
    tanggal_pemakaian: string
    tanggal_pengembalian: string
}


export type FieldType = {
    kendaraans_id?: string;
    locations_id?: string;
    karyawan_id?: string;
    supervisor_id?: string;
    manager_id?: string;
    status_manager?: string;
    status_supervisor?: string;
    tanggal_pemakaian?: string;
    tanggal_pengembalian?: string;
};

export type FieldTypeUpdate = {
    id: number
    status_manager?: number;
    status_supervisor?: number;
}

export type status = {
    Pending: 1,
    Apply: 2
    Reject: 3
}
