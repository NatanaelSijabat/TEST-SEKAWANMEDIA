import React, {
    PropsWithChildren,
    ReactElement,
    ReactNode,
    useState,
} from "react";
import {
    AiOutlineMenuUnfold,
    AiOutlineMenuFold,
    AiOutlineHome,
    AiOutlineUser,
} from "react-icons/ai";
import { BiLogOutCircle } from "react-icons/bi";
import { Layout, Menu, Button, theme, MenuProps } from "antd";
import { Link } from "@inertiajs/react";
import { User } from "@/types";

const { Header, Sider, Content } = Layout;

type MenuItem = Required<MenuProps>["items"][number];

function getItem(
    label: React.ReactNode,
    key: React.Key,
    icon?: React.ReactNode,
    children?: MenuItem[]
): MenuItem {
    return {
        key,
        icon,
        children,
        label,
    } as MenuItem;
}

const itemsAdmin: MenuItem[] = [
    getItem(
        <Link href={"/dashboard"} className="capitalize">
            Dashboard
        </Link>,
        "1",
        <AiOutlineHome />
    ),
    getItem(
        <Link href={"/users"} className="capitalize">
            Users
        </Link>,
        "2",
        <AiOutlineUser />
    ),
    getItem(
        <Link
            href={route("logout")}
            className="capitalize"
            as="button"
            method="post"
        >
            Logout
        </Link>,
        "3",
        <BiLogOutCircle />
    ),
];

const itemsUser: MenuItem[] = [
    getItem(
        <Link href={"/dashboard"} className="capitalize">
            Dashboard
        </Link>,
        "1",
        <AiOutlineHome />
    ),
    getItem(
        <Link
            href={route("logout")}
            className="capitalize"
            as="button"
            method="post"
        >
            Logout
        </Link>,
        "2",
        <BiLogOutCircle />
    ),
];

interface Props {
    children: any;
    user: User;
}

const ExampleSidebar: React.FC<Props> = ({ children, user }) => {
    const [collapsed, setCollapsed] = useState(false);
    const {
        token: { colorBgContainer },
    } = theme.useToken();

    console.log(user.role_users_id, "p");
    return (
        <Layout hasSider>
            <Sider
                trigger={null}
                collapsible
                collapsed={collapsed}
                onCollapse={() => setCollapsed(!collapsed)}
            >
                <div
                    style={{
                        height: 32,
                        margin: 16,
                        background: "rgba(255, 255, 255, 0.2)",
                    }}
                />
                {user.role_users_id === 1 ? (
                    <Menu theme="dark" mode="inline" items={itemsAdmin} />
                ) : (
                    <Menu theme="dark" mode="inline" items={itemsUser} />
                )}
            </Sider>
            <Layout>
                <Header style={{ padding: 0, background: colorBgContainer }}>
                    <Button
                        type="text"
                        icon={
                            collapsed ? (
                                <AiOutlineMenuUnfold />
                            ) : (
                                <AiOutlineMenuFold />
                            )
                        }
                        onClick={() => setCollapsed(!collapsed)}
                        style={{
                            fontSize: "16px",
                            width: 64,
                            height: 64,
                        }}
                    />
                </Header>
                <Content
                    style={{
                        margin: "24px 16px",
                        padding: 24,
                        minHeight: 280,
                        background: colorBgContainer,
                    }}
                >
                    {children as ReactNode}
                </Content>
            </Layout>
        </Layout>
    );
};

export default ExampleSidebar;
